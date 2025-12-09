<?php $this->load->view('user/common/header'); ?>
  <!-- Main Content -->
  <main class="dashboard">
    <div class="dashboard__container">
      <!-- Email Verification Alert -->
      <?php if ((int)$user_details[0]['is_email_verified'] != 1) { ?>
        <div class="dashboard__row" style="margin-bottom: 24px;">
          <div class="card" style="background: rgba(224, 161, 48, 0.1); border: 1px solid rgba(224, 161, 48, 0.3);">
            <div class="card__body" style="padding: 20px;">
              <div style="display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
                <div style="flex: 1;">
                  <h5 style="margin: 0 0 8px 0; color: #fff; font-weight: 600; font-size: 16px;">Email not verified! <span style="color: #E0A130;">Please Verify</span></h5>
                  <?php if (empty($refData)) { ?>
                    <a href="<?php echo site_url('user/verify_mail'); ?>" style="display: inline-block; padding: 8px 16px; background: #E0A130; color: #000; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 14px; margin-top: 8px;">Click here to verify email</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- Top Row -->
      <div class="dashboard__row">
        <!-- Monthly Performance Card -->
        <div class="card card--chart">
          <div class="card__header">
            <div class="card__header-top">
              <div class="card__header-left">
                <h3 class="card__title">Monthly Performance</h3>
                <p class="card__subtitle">Revenue vs Profit Analysis</p>
              </div>
              <div class="chart-legend">
                <div class="chart-legend__item">
                  <span class="chart-legend__dot chart-legend__dot--revenue"></span>
                  <span class="chart-legend__label">Revenue</span>
                </div>
                <div class="chart-legend__item">
                  <span class="chart-legend__dot chart-legend__dot--profit"></span>
                  <span class="chart-legend__label">Profit</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card__body">
            <div class="chart-container">
              <canvas id="monthlyChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Win Rate Card -->
        <div class="card card--winrate">
          <div class="card__header">
            <h3 class="card__title">Win Rate</h3>
            <p class="card__subtitle">Monthly Drawdown &lt; 20%</p>
          </div>
          <div class="card__body">
            <div class="winrate-gauge">
              <div class="winrate-gauge__circle">
                <div class="winrate-gauge__ring">
                  <div class="winrate-gauge__progress"></div>
                </div>
                <div class="winrate-gauge__content">
                  <div class="winrate-gauge__value">98%</div>
                  <div class="winrate-gauge__label">WIN RATIO</div>
                </div>
              </div>
            </div>
            <div class="winrate-metrics">
              <div class="winrate-metric">
                <div class="winrate-metric__label">Trades Taken</div>
                <div class="winrate-metric__value">4,293</div>
              </div>
              <div class="winrate-metric">
                <div class="winrate-metric__label">Profit Factor</div>
                <div class="winrate-metric__value winrate-metric__value--green">3.42</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Row -->
      <div class="dashboard__row">
        <!-- Total Profit Card -->
        <div class="metric-card metric-card--gold">
          <div class="metric-card__top">
            <div class="metric-card__icon metric-card__icon--gold">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2V22M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6312 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6312 13.6815 18 14.5717 18 15.5C18 16.4283 17.6312 17.3185 16.9749 17.9749C16.3185 18.6312 15.4283 19 14.5 19H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
          <div class="metric-card__label">TOTAL PROFIT</div>
          <div class="metric-card__value">$0</div>
          <div style="margin-top: 8px; font-size: 12px; color: #6AC248; display: flex; align-items: center; gap: 4px;">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: inline-block; vertical-align: middle;">
              <path d="M8 4V12M8 12L4 8M8 12L12 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>0% This Month</span>
          </div>
        </div>

        <!-- Profit This Week Card -->
        <div class="metric-card">
          <div class="metric-card__top">
            <div class="metric-card__icon metric-card__icon--green">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                <path d="M3 9H21M9 3V21" stroke="currentColor" stroke-width="2"/>
                <path d="M7 15L10 12L13 15L17 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
          <div class="metric-card__label">PROFIT THIS WEEK</div>
          <div class="metric-card__value">$0</div>
        </div>

        <!-- Profit This Month Card -->
        <div class="metric-card">
          <div class="metric-card__top">
            <div class="metric-card__icon metric-card__icon--green">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 3V21H21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M7 16L12 11L16 15L21 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
          <div class="metric-card__label">PROFIT THIS MONTH</div>
          <div class="metric-card__value">$0</div>
        </div>
      </div>
    </div>
  </main>

  <script>
    // Monthly Performance Chart
    const ctx = document.getElementById('monthlyChart');
    if (ctx) {
      const chartCtx = ctx.getContext('2d');
      
      // Create gradient for revenue fill
      const revenueGradient = chartCtx.createLinearGradient(0, 0, 0, 422);
      revenueGradient.addColorStop(0, 'rgba(224, 161, 48, 0.3)');
      revenueGradient.addColorStop(1, 'rgba(224, 161, 48, 0)');
      
      const monthlyChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [
            {
              label: 'Revenue',
              data: [3200, 2800, 9500, 5200, 4800, 6200, 7100, 4800, 6500, 8800, 9200, 9800],
              borderColor: '#E0A130',
              backgroundColor: revenueGradient,
              borderWidth: 2,
              fill: true,
              tension: 0.4,
              pointRadius: 0,
              pointHoverRadius: 4,
              pointHoverBackgroundColor: '#E0A130',
              pointHoverBorderColor: '#E0A130',
            },
            {
              label: 'Profit',
              data: [1200, 1100, 3500, 2000, 1800, 2400, 2800, 1890, 2500, 3200, 3400, 3600],
              borderColor: '#6AC248',
              backgroundColor: 'transparent',
              borderWidth: 2,
              fill: false,
              tension: 0.4,
              pointRadius: 5,
              pointBackgroundColor: '#6AC248',
              pointBorderColor: '#6AC248',
              pointHoverRadius: 6,
              pointHoverBackgroundColor: '#6AC248',
              pointHoverBorderColor: '#6AC248',
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              enabled: true,
              backgroundColor: 'rgba(0, 0, 0, 0.8)',
              titleColor: '#FFFFFF',
              bodyColor: '#FFFFFF',
              borderColor: 'rgba(255, 255, 255, 0.1)',
              borderWidth: 1,
              padding: 12,
              cornerRadius: 8,
              displayColors: true,
              callbacks: {
                title: function(context) {
                  const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                                     'July', 'August', 'September', 'October', 'November', 'December'];
                  return monthNames[context[0].dataIndex];
                },
                label: function(context) {
                  const label = context.dataset.label || '';
                  const value = context.parsed.y;
                  const color = context.dataset.borderColor;
                  return label + ': $' + value.toLocaleString();
                },
                labelColor: function(context) {
                  return {
                    borderColor: context.dataset.borderColor,
                    backgroundColor: context.dataset.borderColor,
                    borderWidth: 2,
                    borderRadius: 2
                  };
                }
              }
            }
          },
          scales: {
            x: {
              grid: {
                display: true,
                color: 'rgba(255, 255, 255, 0.1)',
                lineWidth: 1,
                drawBorder: false,
                borderDash: [2, 2]
              },
              ticks: {
                color: '#FFFFFF',
                font: {
                  family: 'Inter',
                  size: 12,
                  weight: 400
                }
              }
            },
            y: {
              beginAtZero: true,
              max: 10000,
              ticks: {
                stepSize: 2500,
                color: '#FFFFFF',
                font: {
                  family: 'Inter',
                  size: 12,
                  weight: 400
                },
                callback: function(value) {
                  return '$' + (value / 1000) + 'k';
                }
              },
              grid: {
                display: true,
                color: 'rgba(255, 255, 255, 0.1)',
                lineWidth: 1,
                drawBorder: false,
                borderDash: [2, 2]
              }
            }
          },
          interaction: {
            intersect: false,
            mode: 'index'
          }
        }
      });
    }
  </script>
  <?php $this->load->view('user/common/footer'); ?>