<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use App\Models\CopyTrader;
use App\Models\User;
use App\Models\UserCopyInvestment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CopyTradeSubscriptionsTest extends TestCase
{
    use RefreshDatabase;

    protected function makeAdmin(): Admin
    {
        return Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
    }

    protected function makeTrader(): CopyTrader
    {
        return CopyTrader::create([
            'name' => 'Trader One',
            'username' => 'trader1',
            'email' => 'trader1@example.com',
            'bio' => 'Bio',
            'risk_level' => 'low',
            'level' => 'Pro',
            'trading_style' => 'Scalping',
            'status' => 'active',
            'badges' => [],
            'followers' => 0,
            'copiers' => 0,
            'trades' => 0,
            'win_trades' => 0,
            'win_rate' => 0,
            'total_aum' => 0,
            'roi' => 0,
            'pnl' => 0,
            'sharp_ratio' => 0,
            'mdd' => 0,
            'profit_sharing' => 0,
            'lead_balance' => 0,
            'min_copy_amount' => 0,
            'max_copy_amount' => 0,
            'member_since' => now(),
            'asset_preferences' => [],
            'position_history' => [],
        ]);
    }

    public function test_index_requires_admin_and_loads_for_authorized()
    {
        $response = $this->get(route('admin.copytrade-subscriptions.index'));
        $response->assertStatus(302); // redirected to login

        $admin = $this->makeAdmin();
        $this->actingAs($admin, 'admin');

        $response = $this->get(route('admin.copytrade-subscriptions.index'));
        $response->assertStatus(200);
        $response->assertSee('Copy Trading Subscriptions');
    }

    public function test_pause_resume_terminate_actions()
    {
        $admin = $this->makeAdmin();
        $this->actingAs($admin, 'admin');

        $user = User::factory()->create();
        $trader = $this->makeTrader();
        $investment = UserCopyInvestment::create([
            'user_id' => $user->id,
            'copy_trader_id' => $trader->id,
            'investment_amount' => 1000,
            'fee_percentage' => 10,
            'fee_amount' => 100,
            'net_investment' => 900,
            'min_profit_percentage' => 2,
            'max_profit_percentage' => 10,
            'start_date' => now(),
            'status' => 'active',
        ]);

        $this->post(route('admin.copytrade-subscriptions.pause', $investment->id))->assertRedirect();
        $this->assertEquals('paused', $investment->fresh()->status);

        $this->post(route('admin.copytrade-subscriptions.resume', $investment->id))->assertRedirect();
        $this->assertEquals('active', $investment->fresh()->status);

        $this->post(route('admin.copytrade-subscriptions.terminate', $investment->id))->assertRedirect();
        $this->assertEquals('terminated', $investment->fresh()->status);
    }

    public function test_export_csv_returns_csv_content()
    {
        $admin = $this->makeAdmin();
        $this->actingAs($admin, 'admin');

        $response = $this->get(route('admin.copytrade-subscriptions.export'));
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv');
        $this->assertStringContainsString('ID', $response->getContent());
    }
}