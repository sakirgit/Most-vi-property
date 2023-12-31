<?php
global $post;
$mcal_down_payment = '';
$currency_symbol = currency_maker();
$currency_symbol = $currency_symbol['currency'];
$mcal_terms = houzez_option('mcal_terms', 12);
$mcal_down_payment = houzez_option('mcal_down_payment', 15);
$mcal_interest_rate = houzez_option('mcal_interest_rate', 3.5);
$mcal_prop_tax_enable = houzez_option('mcal_prop_tax_enable', 1);
$mcal_prop_tax = houzez_option('mcal_prop_tax', 3000);
$mcal_hi_enable = houzez_option('mcal_hi_enable', 1);
$mcal_hi = houzez_option('mcal_hi', 1000);
$mcal_hoa_enable = houzez_option('mcal_hoa_enable', 1);
$mcal_hoa = houzez_option('mcal_hoa', 250);
$mcal_pmi_enable = houzez_option('mcal_pmi_enable', 1);
$mcal_pmi = houzez_option('mcal_pmi');
$property_price = get_post_meta($post->ID, 'fave_property_price', true); 
$property_price = intval($property_price);

if ( class_exists( 'FCC_Rates' ) && houzez_currency_switcher_enabled() && isset( $_COOKIE[ "houzez_set_current_currency" ] ) ) {

    $currency_data = Fcc_get_currency($_COOKIE['houzez_set_current_currency']);
    $currency_symbol = $currency_data['symbol'];

    if( function_exists('houzez_get_plain_price') ) {
	    $property_price = houzez_get_plain_price($property_price );
	}
}

if($property_price == 0) {
	$mcal_terms = $mcal_down_payment = $mcal_interest_rate = $mcal_prop_tax = $mcal_hi = $mcal_pmi = $mcal_hoa = $property_price = '';
}

?>
<div class="d-flex align-items-center sm-column">
	<div class="mortgage-calculator-chart flex-fill">
		<div class="mortgage-calculator-monthly-payment-wrap">
			<div id="m_monthly_val" class="mortgage-calculator-monthly-payment"></div>
			<div class="mortgage-calculator-monthly-requency"><?php echo houzez_option('spc_monthly', 'Monthly'); ?></div>
		</div>

		<canvas id="mortgage-calculator-chart" width="300" height="300"></canvas>


	</div><!-- mortgage-calculator-chart -->
	<div class="mortgage-calculator-data flex-fill">
		<ul class="list-unstyled">
			<li class="mortgage-calculator-data-1 stats-data-01">
				<i class="houzez-icon icon-sign-badge-circle mr-1"></i> 
				<strong><?php echo houzez_option('spc_down_payment', 'Down Payment'); ?></strong> 
				<span id="downPaymentResult"></span>
			</li>

			<li class="mortgage-calculator-data-1 stats-data-01">
				<i class="houzez-icon icon-sign-badge-circle mr-1"></i> 
				<strong><?php echo houzez_option('spc_loan_amount', 'Loan Amount'); ?></strong> 
				<span id="loadAmountResult"></span>
			</li>

			<li class="mortgage-calculator-data-1 stats-data-1">
				<i class="houzez-icon icon-sign-badge-circle mr-1"></i> 
				<strong><?php echo houzez_option('spc_monthly_mortgage_payment', 'Monthly Mortgage Payment'); ?></strong> 
				<span id="monthlyMortgagePaymentResult"></span>
			</li>

			<?php if($mcal_prop_tax_enable) { ?>
			<li class="mortgage-calculator-data-2 stats-data-2">
				<i class="houzez-icon icon-sign-badge-circle mr-1"></i> 
				<strong><?php echo houzez_option('spc_prop_tax', 'Property Tax'); ?></strong> 
				<span id="monthlyPropertyTaxResult"></span>
			</li>
			<?php } ?>

			<?php if($mcal_hi_enable) { ?>
			<li class="mortgage-calculator-data-3 stats-data-3">
				<i class="houzez-icon icon-sign-badge-circle mr-1"></i> 
				<strong><?php echo houzez_option('spc_hi', 'Home Insurance'); ?></strong> 
				<span id="monthlyHomeInsuranceResult"></span>
			</li>
			<?php } ?>

			<?php if($mcal_pmi_enable) { ?>
			<li class="mortgage-calculator-data-4 rslt-pmi stats-data-4">
				<i class="houzez-icon icon-sign-badge-circle mr-1"></i> 
				<strong><?php echo houzez_option('spc_pmi', 'PMI'); ?></strong> 
				<span id="monthlyPMIResult"></span>
			</li>
			<?php } ?>

			<?php if($mcal_hoa_enable) { ?>
			<li class="mortgage-calculator-data-4 stats-data-04">
				<i class="houzez-icon icon-sign-badge-circle mr-1"></i> 
				<strong><?php echo houzez_option('spc_hoa', 'Monthly HOA Fees'); ?></strong> 
				<span id="monthlyHOAResult"></span>
			</li>
			<?php } ?>
		</ul>
	</div><!-- mortgage-calculator-data -->
</div><!-- d-flex -->

<form id="houzez-calculator-form" method="post">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label><?php echo houzez_option('spc_total_amt', 'Total Amount'); ?></label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><?php echo esc_attr($currency_symbol);?></div>
					</div><!-- input-group-prepend -->
					<input id="homePrice" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_total_amt', 'Total Amount'); ?>" value="<?php echo intval($property_price); ?>">
				</div><!-- input-group -->
			</div><!-- form-group -->
		</div><!-- col-md-4 -->
		<div class="col-md-4">
			<div class="form-group">
				<label><?php echo houzez_option('spc_down_payment', 'Down Payment'); ?></label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">%</div>
					</div><!-- input-group-prepend -->
					<input id="downPaymentPercentage" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_down_payment', 'Down Payment'); ?>" value="<?php echo esc_attr($mcal_down_payment); ?>">
				</div><!-- input-group -->
			</div><!-- form-group -->
		</div><!-- col-md-4 -->
		<div class="col-md-4">
			<div class="form-group">
				<label><?php echo houzez_option('spc_ir', 'Interest Rate'); ?></label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">%</div>
					</div><!-- input-group-prepend -->
					<input id="annualInterestRate" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_ir', 'Interest Rate'); ?>" value="<?php echo esc_attr($mcal_interest_rate); ?>">
				</div><!-- input-group -->
			</div><!-- form-group -->
		</div><!-- col-md-4 -->
		<div class="col-md-4">
			<div class="form-group">
				<label><?php echo houzez_option('spc_load_term', 'Loan Terms (Years)'); ?></label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="houzez-icon icon-calendar-3"></i>
						</div>
					</div><!-- input-group-prepend -->
					<input id="loanTermInYears" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_load_term', 'Loan Terms (Years)'); ?>" value="<?php echo esc_attr($mcal_terms); ?>">
				</div><!-- input-group -->
			</div><!-- form-group -->
		</div><!-- col-md-4 -->

		<?php if($mcal_prop_tax_enable) { ?>
		<div class="col-md-4">
			<div class="form-group">
				<label><?php echo houzez_option('spc_prop_tax', 'Annual Property Tax Rate'); ?></label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">%</div>
					</div><!-- input-group-prepend -->
					<input id="annualPropertyTaxRate" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_prop_tax', 'Property Tax'); ?>" value="<?php echo esc_attr($mcal_prop_tax); ?>">
				</div><!-- input-group -->
			</div><!-- form-group -->
		</div><!-- col-md-4 -->
		<?php } ?>


		<?php if($mcal_hi_enable) { ?>
		<div class="col-md-4">
			<div class="form-group">
				<label><?php echo houzez_option('spc_hi', 'Annual Home Insurance'); ?></label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><?php echo esc_attr($currency_symbol);?></div>
					</div><!-- input-group-prepend -->
					<input id="annualHomeInsurance" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_hi', 'Home Insurance'); ?>" value="<?php echo esc_attr($mcal_hi); ?>">
				</div><!-- input-group -->
			</div><!-- form-group -->
		</div><!-- col-md-4 -->
		<?php } ?>

		<?php if($mcal_hoa_enable) { ?>
		<div class="col-md-4">
			<div class="form-group">
				<label><?php echo houzez_option('spc_hoa', 'Monthly HOA Fees'); ?></label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><?php echo esc_attr($currency_symbol);?></div>
					</div><!-- input-group-prepend -->
					<input id="monthlyHOAFees" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_hoa', 'Monthly HOA Fees'); ?>" value="<?php echo esc_attr($mcal_hoa); ?>">
				</div><!-- input-group -->
			</div><!-- form-group -->
		</div><!-- col-md-4 -->
		<?php } ?>

		<?php if($mcal_pmi_enable) { ?>
		<div class="col-md-4">
			<div class="form-group">
				<label><?php echo houzez_option('spc_pmi', 'PMI'); ?></label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">%</div>
					</div><!-- input-group-prepend -->
					<input id="pmi" type="text" class="form-control" placeholder="<?php echo houzez_option('spc_pmi', 'PMI'); ?>" value="<?php echo esc_attr($mcal_pmi); ?>">
				</div><!-- input-group -->
			</div><!-- form-group -->
		</div><!-- col-md-4 -->
		<?php } ?>
	</div><!-- row -->
</form>