<?php
/**
 * Template Name: Home Design Test
 * Template Post Type: page
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$demo_url          = apply_filters( 'infometry_home_demo_url', home_url( '/infofiscus-analytics-sign-up-for-demo/' ) );
$contact_url       = apply_filters( 'infometry_home_contact_url', home_url( '/contact-us/' ) );
$conversa_url      = home_url( '/product/conversational-analytics/' );
$snowflake_url     = home_url( '/product/snowflake-native-apps/' );
$informatica_url   = home_url( '/product/informatica-connectors/' );
$netsuite_url      = home_url( '/product/netsuite-to-snowflake-connector/' );
$accelerators_url  = home_url( '/product/accelerators-for-data-warehouse-migration-automation/' );
$prebuilt_apps_url = home_url( '/product/pre-built-analytics-apps-for-idmc-and-matillion/' );
$customers_url     = home_url( '/company/customers-partners/' );
$partners_url      = home_url( '/company/customers-partners/#infometry-partners' );
$databricks_url    = home_url( '/databricks-solutions/' );
$snowflake_sol_url = home_url( '/snowflake-solutions/' );
$google_cloud_url  = home_url( '/product/google-cloud-connectors/' );
$dbt_url           = home_url( '/dbt-migration/' );
$about_url         = home_url( '/company/' );
$retail_url        = home_url( '/retail/' );
$manufacturing_url = home_url( '/manufacturing-and-supply-chain/' );
$healthcare_url    = home_url( '/healthcare/' );
$finance_url       = home_url( '/finance/' );
$technology_url    = home_url( '/high-tech/' );
$life_sciences_url = home_url( '/life-sciences-and-pharmaceutical/' );
$energy_url        = home_url( '/solar-and-energy/' );
$cpg_url           = home_url( '/retail/' );
?>

<main class="infometry-home-test" id="infometry-home-test">
	<svg class="infometry-icon-sprite" aria-hidden="true" focusable="false">
		<symbol id="i-chat" viewBox="0 0 24 24"><path d="M5 4h14a3 3 0 0 1 3 3v7a3 3 0 0 1-3 3h-7l-5 4v-4H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3Z"/><circle cx="8" cy="10.5" r="1"/><circle cx="12" cy="10.5" r="1"/><circle cx="16" cy="10.5" r="1"/></symbol>
		<symbol id="i-snow" viewBox="0 0 24 24"><path d="M12 2v20M4.2 6.5l15.6 11M19.8 6.5l-15.6 11M8.5 4 12 6l3.5-2M8.5 20l3.5-2 3.5 2M3 10l3 2-3 2M21 10l-3 2 3 2"/></symbol>
		<symbol id="i-link" viewBox="0 0 24 24"><path d="m9 15 6-6M7.5 18H6a4 4 0 0 1 0-8h3M16.5 6H18a4 4 0 0 1 0 8h-3"/></symbol>
		<symbol id="i-grid" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h7v7h-7z"/></symbol>
		<symbol id="i-rocket" viewBox="0 0 24 24"><path d="M14 4c3-2 6-2 6-2s0 3-2 6l-5 5-5-5 6-4Z"/><path d="m8 8-4 1-2 3 6 1M13 13l-1 6-3 2-1-8M6 16c-2 0-3 1-3 3 2 0 3-1 3-3Z"/><circle cx="15.5" cy="6.5" r="1.5"/></symbol>
		<symbol id="i-headset" viewBox="0 0 24 24"><path d="M4 13v-2a8 8 0 0 1 16 0v2M4 13H2v6h4v-6H4Zm16 0h2v6h-4v-6h2ZM18 19c0 2-2 3-5 3"/></symbol>
		<symbol id="i-target" viewBox="0 0 24 24"><circle cx="11" cy="13" r="8"/><circle cx="11" cy="13" r="4"/><path d="m11 13 10-10M16 3h5v5"/></symbol>
		<symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Z"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="i-cloud" viewBox="0 0 24 24"><path d="M6 18a4 4 0 0 1-.5-8A7 7 0 0 1 19 11a3.5 3.5 0 0 1-1 7H6Z"/><path d="M12 11v10m-4-6 4-4 4 4"/></symbol>
		<symbol id="i-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2"/><path d="M3 20v-2a6 6 0 0 1 12 0v2M15 14c4 0 6 2 6 5"/></symbol>
		<symbol id="i-bag" viewBox="0 0 24 24"><path d="M4 8h16l-1 13H5L4 8Z"/><path d="M9 9V6a3 3 0 0 1 6 0v3"/></symbol>
		<symbol id="i-building" viewBox="0 0 24 24"><path d="M4 21V5h10v16M14 10h6v11M8 9h2m-2 4h2m-2 4h2m8-3h-2m2 4h-2M2 21h20"/></symbol>
		<symbol id="i-heart" viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z"/></symbol>
		<symbol id="i-bank" viewBox="0 0 24 24"><path d="m3 9 9-6 9 6H3Zm2 2v8m5-8v8m4-8v8m5-8v8M3 21h18"/></symbol>
		<symbol id="i-tech" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8m-4-4v4"/></symbol>
		<symbol id="i-nodes" viewBox="0 0 24 24"><circle cx="6" cy="6" r="2"/><circle cx="18" cy="6" r="2"/><circle cx="6" cy="18" r="2"/><circle cx="18" cy="18" r="2"/><path d="M8 6h8M6 8v8m12-8v8M8 18h8"/></symbol>
	</svg>

	<section class="infometry-hero" aria-labelledby="infometry-hero-title">
		<div class="infometry-orb infometry-orb-one"></div>
		<div class="infometry-orb infometry-orb-two"></div>
		<div class="infometry-shell infometry-hero-grid">
			<div class="infometry-hero-copy">
				<span class="infometry-eyebrow">AI-powered conversational analytics</span>
				<h1 id="infometry-hero-title">Ask Anything.<br>Get Answers.<br><span>Drive Impact.</span></h1>
				<p>INFOFISCUS Conversa turns enterprise data into instant insights, clear visualizations, and actionable recommendations—simply by asking.</p>
				<div class="infometry-actions">
					<a class="infometry-button infometry-button-primary" href="<?php echo esc_url( $demo_url ); ?>">Request a Demo <span aria-hidden="true">→</span></a>
					<a class="infometry-button infometry-button-ghost" href="#infometry-products"><span class="infometry-play" aria-hidden="true">▶</span> Explore Solutions</a>
				</div>
				<div class="infometry-hero-benefits" aria-label="Product benefits">
					<span><svg><use href="#i-chat"/></svg>No SQL<br>Just Ask</span>
					<span><svg><use href="#i-snow"/></svg>Instant<br>Insights</span>
					<span><svg><use href="#i-shield"/></svg>Enterprise<br>Secure</span>
					<span><svg><use href="#i-target"/></svg>Actionable<br>Outcomes</span>
				</div>
			</div>

			<div class="infometry-dashboard-wrap infometry-hero-slider" aria-label="INFOFISCUS Conversa product preview carousel">
				<figure class="infometry-hero-slide is-home">
					<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/conversa-home-1.ppg' ); ?>" alt="INFOFISCUS Conversa home dashboard">
				</figure>
				<figure class="infometry-hero-slide is-storybooks">
					<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/conversa-storybooks-1.ppg' ); ?>" alt="INFOFISCUS Conversa storybooks dashboard">
				</figure>
				<figure class="infometry-hero-slide is-connections">
					<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/conversa-connections-1.ppg' ); ?>" alt="INFOFISCUS Conversa connections dashboard">
				</figure>
				<div class="infometry-hero-slider-dots" aria-hidden="true"><span></span><span></span><span></span></div>
			</div>
		</div>
	</section>

	<section class="infometry-trust" id="infometry-impact" aria-label="Infometry experience and impact">
		<div class="infometry-shell infometry-trust-inner">
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="15" data-counter-suffix="+">0+</b><span>Years of Excellence</span></div>
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="150" data-counter-suffix="+">0+</b><span>Happy Customers</span></div>
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="350" data-counter-suffix="+">0+</b><span>Successful Projects</span></div>
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="22" data-counter-suffix="+">0+</b><span>Innovative Products</span></div>
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="100" data-counter-suffix="+">0+</b><span>Experts &amp; Growing</span></div>
			<div class="infometry-partner-panel">
				<span class="infometry-partner-heading">Our Partners</span>
				<div class="infometry-partners" id="infometry-partner-carousel" aria-label="Technology partners">
					<a class="infometry-partner-item snowflake" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/snowflake-logo.png' ); ?>" alt="Snowflake"></a>
					<a class="infometry-partner-item databricks" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/databricks-logo.png' ); ?>" alt="Databricks"></a>
					<a class="infometry-partner-item gcloud" href="<?php echo esc_url( $partners_url ); ?>"><span class="infometry-gcloud-lockup"><img class="infometry-gcloud-mark" src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/google-cloud-mark.png' ); ?>" alt=""><img class="infometry-gcloud-wordmark" src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/google-cloud-wordmark.png' ); ?>" alt="Google Cloud"></span></a>
					<a class="infometry-partner-item informatica" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/informatica-logo.png' ); ?>" alt="Informatica"></a>
					<a class="infometry-partner-item dbt" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/dbt-labs-logo.png' ); ?>" alt="dbt Labs"></a>
					<a class="infometry-partner-item hvr" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/partner-hvr.png' ); ?>" alt="HVR"></a>
					<a class="infometry-partner-item matillion" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/partner-matillion.png' ); ?>" alt="Matillion"></a>
					<a class="infometry-partner-item mulesoft" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/partner-mulesoft.png' ); ?>" alt="MuleSoft"></a>
				</div>
			</div>
		</div>
	</section>

	<section class="infometry-who" aria-labelledby="infometry-who-title">
		<div class="infometry-shell">
			<div class="infometry-who-panel">
				<div class="infometry-who-copy">
					<span>Who we are</span>
					<h2 id="infometry-who-title">Enterprise Data. Intelligent Decisions. Real Business Impact.</h2>
					<p>Infometry is a global products and solutions company helping enterprises simplify complex data ecosystems through AI-powered analytics, Agentic AI and No-Code/Low-Code innovation.</p>
					<p>With 15+ years of delivery excellence and 350+ successful projects, we modernize data platforms and turn trusted data into faster, actionable decisions.</p>
					<a href="<?php echo esc_url( $about_url ); ?>">Discover Infometry <span aria-hidden="true">→</span></a>
				</div>
				<div class="infometry-who-insight">
					<div class="infometry-who-intro"><span>Built for enterprise transformation</span><strong>From complex data<br>to trusted action.</strong></div>
					<div class="infometry-who-pillars">
						<article><svg><use href="#i-target"/></svg><h3>AI-Powered Analytics</h3><p>Real-time insights and recommendations.</p></article>
						<article><svg><use href="#i-cloud"/></svg><h3>Modern Data Platforms</h3><p>Cloud-ready, governed and scalable.</p></article>
						<article><svg><use href="#i-rocket"/></svg><h3>Accelerated Outcomes</h3><p>Low-code innovation that moves faster.</p></article>
					</div>
					<div class="infometry-who-journey" aria-label="Infometry delivery journey"><span><b>01</b><em>Discover</em><small>Align data and goals</small></span><span><b>02</b><em>Modernize</em><small>Build governed platforms</small></span><span><b>03</b><em>Activate</em><small>Scale insights and AI</small></span></div>
				</div>
			</div>
		</div>
	</section>

	<section class="infometry-products" id="infometry-products" aria-labelledby="infometry-products-title">
		<div class="infometry-shell">
			<header class="infometry-section-head"><h2 id="infometry-products-title">Innovative Products. Intelligent Solutions.</h2><p>Built to modernize your data journey and accelerate business outcomes.</p></header>
			<div class="infometry-card-grid infometry-product-grid" id="infometry-product-carousel" tabindex="0" aria-label="Infometry products">
				<article class="infometry-product-card is-featured"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infofiscus-conversa-mark.png' ); ?>" alt="INFOFISCUS Conversa"></div><span class="infometry-product-kicker">Conversational AI</span><h3>INFOFISCUS<br>Conversa</h3><p>Ask business questions in natural language and receive trusted answers, visualizations and recommendations from enterprise data in seconds.</p><div class="infometry-product-highlights"><span>Natural Language</span><span>Instant Insights</span></div><a href="<?php echo esc_url( $conversa_url ); ?>">Explore Conversa →</a></article>
				<article class="infometry-product-card"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/snowflake-product-mark.png' ); ?>" alt="Snowflake"></div><span class="infometry-product-kicker">Cloud Data Apps</span><h3>Snowflake<br>Native Apps</h3><p>Launch production-ready data products directly inside Snowflake with governed access, secure sharing and faster time to business value.</p><div class="infometry-product-highlights"><span>Marketplace Ready</span><span>Governed Data</span></div><a href="<?php echo esc_url( $snowflake_url ); ?>">Explore Apps →</a></article>
				<article class="infometry-product-card"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/informatica-mark.png' ); ?>" alt="Informatica"></div><span class="infometry-product-kicker">Data Integration</span><h3>Informatica<br>Connectors</h3><p>Connect Informatica to modern cloud platforms with enterprise-grade pipelines designed for dependable, scalable and seamless data movement.</p><div class="infometry-product-highlights"><span>Faster Integration</span><span>Reliable Pipelines</span></div><a href="<?php echo esc_url( $informatica_url ); ?>">Explore Connectors →</a></article>
				<article class="infometry-product-card"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/netsuite-mark.png' ); ?>" alt="NetSuite"></div><span class="infometry-product-kicker">Snowflake Connector</span><h3>NetSuite<br>Connector</h3><p>Synchronize NetSuite financial and operational data with your modern platform through secure, bi-directional and near real-time integration.</p><div class="infometry-product-highlights"><span>Bi-directional</span><span>Near Real-time</span></div><a href="<?php echo esc_url( $netsuite_url ); ?>">Explore Now →</a></article>
				<article class="infometry-product-card"><div class="infometry-card-icon blue"><svg><use href="#i-rocket"/></svg></div><span class="infometry-product-kicker">Analytics &amp; AI</span><h3>Data &amp; AI<br>Accelerators</h3><p>Move from idea to production faster with reusable frameworks for analytics, machine learning, governance and responsible enterprise AI.</p><div class="infometry-product-highlights"><span>Faster Delivery</span><span>Production Ready</span></div><a href="<?php echo esc_url( $accelerators_url ); ?>">Explore Accelerators →</a></article>
				<article class="infometry-product-card"><div class="infometry-card-icon"><svg><use href="#i-headset"/></svg></div><span class="infometry-product-kicker">Platform Operations</span><h3>Managed Services<br>&amp; Support</h3><p>Keep your data estate reliable, secure and cost-efficient with proactive monitoring, expert optimization and responsive ongoing support.</p><div class="infometry-product-highlights"><span>24×7 Support</span><span>Cost Optimization</span></div><a href="<?php echo esc_url( $contact_url ); ?>">Explore Services →</a></article>
				<article class="infometry-product-card"><div class="infometry-card-icon blue"><svg><use href="#i-grid"/></svg></div><span class="infometry-product-kicker">Pre-Built Analytics</span><h3>Pre-Built<br>Analytics Apps</h3><p>Deploy ready-to-use analytics modules for Finance, Sales and Marketing to accelerate reporting, surface insights and shorten time to value.</p><div class="infometry-product-highlights"><span>Finance Analytics</span><span>Sales &amp; Marketing</span></div><a href="<?php echo esc_url( $prebuilt_apps_url ); ?>">Explore Apps →</a></article>
			</div>
		</div>
	</section>

	<section class="infometry-values" aria-label="Our capabilities">
		<header class="infometry-capabilities-head"><h2>Our Capabilities</h2></header>
		<div class="infometry-shell infometry-value-grid" id="infometry-capability-carousel" tabindex="0" aria-label="Infometry capabilities">
			<article class="infometry-capability-item"><svg><use href="#i-chat"/></svg><div><h3>Conversational AI Analytics</h3><p>Natural-language interaction with enterprise data that removes barriers to trusted insights.</p></div></article>
			<article class="infometry-capability-item"><svg><use href="#i-rocket"/></svg><div><h3>AI/ML + Agentic Intelligence</h3><p>Automated insights, recommendations and action-driven analytics workflows.</p></div></article>
			<article class="infometry-capability-item"><svg><use href="#i-grid"/></svg><div><h3>Low-Code Data Fabric Tools</h3><p>Faster integration and orchestration with less engineering effort.</p></div></article>
			<article class="infometry-capability-item"><svg><use href="#i-target"/></svg><div><h3>Advanced Analytics</h3><p>Predictive and prescriptive intelligence for forward-looking decisions.</p></div></article>
			<article class="infometry-capability-item"><svg><use href="#i-nodes"/></svg><div><h3>Unified Data + Document Intelligence</h3><p>Analytics beyond structured data for enterprise knowledge discovery.</p></div></article>
		</div>
	</section>

	<section class="infometry-industries" id="infometry-industries" aria-labelledby="infometry-industries-title">
		<div class="infometry-shell">
			<header class="infometry-section-head"><span>Industry expertise</span><h2 id="infometry-industries-title">Delivering Impact Across Industries</h2></header>
			<div class="infometry-card-grid infometry-industry-grid" id="infometry-industry-carousel" tabindex="0" aria-label="Infometry industry verticals">
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-tech"/></svg></div><h3>Hi-Tech</h3><p>Accelerate product innovation and recurring growth with real-time analytics and AI-ready data platforms.</p><div class="infometry-industry-focus"><span>Product Analytics</span><span>AI Acceleration</span></div><a href="<?php echo esc_url( $technology_url ); ?>" aria-label="Explore Hi-Tech">→</a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-bag"/></svg></div><h3>Retail</h3><p>Connect shopper, inventory and merchandising data to improve experiences, loyalty and profitable growth.</p><div class="infometry-industry-focus"><span>Customer 360</span><span>Demand Planning</span></div><a href="<?php echo esc_url( $retail_url ); ?>" aria-label="Explore Retail">→</a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-nodes"/></svg></div><h3>Consumer Packaged Goods</h3><p>Unify consumer, channel and supply-chain insights to optimize promotions, assortment and distribution.</p><div class="infometry-industry-focus"><span>Trade Analytics</span><span>Supply Insights</span></div><a href="<?php echo esc_url( $cpg_url ); ?>" aria-label="Explore Consumer Packaged Goods">→</a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-bank"/></svg></div><h3>Financial Services</h3><p>Modernize risk, fraud and customer intelligence with secure, governed data products built to scale.</p><div class="infometry-industry-focus"><span>Risk Analytics</span><span>Fraud Detection</span></div><a href="<?php echo esc_url( $finance_url ); ?>" aria-label="Explore Financial Services">→</a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-building"/></svg></div><h3>Manufacturing &amp; Supply Chain</h3><p>Unify plant and operational data to improve throughput, predict maintenance and reduce costly downtime.</p><div class="infometry-industry-focus"><span>Smart Factory</span><span>Predictive Ops</span></div><a href="<?php echo esc_url( $manufacturing_url ); ?>" aria-label="Explore Manufacturing and Supply Chain">→</a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-heart"/></svg></div><h3>Life Sciences &amp; Pharmaceutical</h3><p>Connect research, clinical and commercial data to accelerate discovery and improve compliant decisions.</p><div class="infometry-industry-focus"><span>Clinical Insights</span><span>Compliance</span></div><a href="<?php echo esc_url( $life_sciences_url ); ?>" aria-label="Explore Life Sciences and Pharmaceutical">→</a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-cloud"/></svg></div><h3>Solar &amp; Energy</h3><p>Turn asset, grid and operational data into reliable forecasting, performance and sustainability insights.</p><div class="infometry-industry-focus"><span>Asset Performance</span><span>Forecasting</span></div><a href="<?php echo esc_url( $energy_url ); ?>" aria-label="Explore Solar and Energy">→</a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-heart"/></svg></div><h3>Healthcare</h3><p>Deliver trusted insights that improve patient outcomes, care coordination and operational efficiency.</p><div class="infometry-industry-focus"><span>Patient Insights</span><span>Data Governance</span></div><a href="<?php echo esc_url( $healthcare_url ); ?>" aria-label="Explore Healthcare">→</a></article>
			</div>
		</div>
	</section>

	<section class="infometry-customers" aria-labelledby="infometry-customers-title">
		<div class="infometry-shell">
			<header class="infometry-section-head infometry-customers-head"><span>Customer success</span><h2 id="infometry-customers-title">Trusted by 150+ Customers Worldwide</h2></header>
			<div class="infometry-customer-carousel" id="infometry-customer-carousel" aria-label="Infometry customers">
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-michaels.png' ); ?>" alt="Michaels"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-fusion-io.png' ); ?>" alt="Fusion-io"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-adaptive-insights.png' ); ?>" alt="Adaptive Insights"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-informatica.png' ); ?>" alt="Informatica"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-sandisk.png' ); ?>" alt="SanDisk"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-ibm.png' ); ?>" alt="IBM"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-belk.png' ); ?>" alt="Belk"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-sanofi.png' ); ?>" alt="Sanofi"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-asana.png' ); ?>" alt="Asana"></a>
			</div>
		</div>
	</section>

	<section class="infometry-final-cta">
		<div class="infometry-shell">
			<div class="infometry-cta-panel">
				<div class="infometry-cta-copy"><img class="infometry-cta-logo" src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry Inc. — Enabling AI for Every Enterprise"><span>Ready to move faster?</span><h2>Turn Your Data Into<br>Decisions That Drive Growth</h2><p>Experience the power of conversational analytics with INFOFISCUS Conversa.</p><div class="infometry-cta-proof"><span><b>15+</b> Years of data expertise</span><span><b>150+</b> Enterprise customers</span><span><b>24×7</b> Expert support</span></div></div>
				<div class="infometry-actions"><a class="infometry-button infometry-button-light" href="<?php echo esc_url( $demo_url ); ?>">Schedule a Demo <span>→</span></a><a class="infometry-button infometry-button-ghost" href="<?php echo esc_url( $contact_url ); ?>">Talk to an Expert</a></div>
				<div class="infometry-cta-art" aria-hidden="true"><span>Enterprise AI</span><i></i><i></i><i></i><b>AI</b></div>
			</div>
		</div>
	</section>
</main>

<footer class="infometry-custom-footer" id="infometry-footer" aria-label="Infometry website footer">
	<div class="infometry-shell">
		<div class="infometry-footer-grid">
			<div class="infometry-footer-connect">
				<h2>Connect with us</h2>
				<a class="infometry-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry Inc. — Enabling AI for Every Enterprise"></a>
				<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
				<div class="infometry-footer-social" aria-label="Infometry social profiles">
					<a href="https://www.facebook.com/infometryinc/" target="_blank" rel="noopener" aria-label="Infometry on Facebook"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-facebook.png' ); ?>" alt=""></a>
					<a href="https://x.com/Infometryinc" target="_blank" rel="noopener" aria-label="Infometry on X"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-x.png' ); ?>" alt=""></a>
					<a href="https://www.linkedin.com/company/infometry-inc" target="_blank" rel="noopener" aria-label="Infometry on LinkedIn"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-linkedin.png' ); ?>" alt=""></a>
					<a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" target="_blank" rel="noopener" aria-label="Infometry on YouTube"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-youtube.png' ); ?>" alt=""></a>
					<a href="https://in.pinterest.com/infometryincus/_saved/" target="_blank" rel="noopener" aria-label="Infometry on Pinterest"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-pinterest.png' ); ?>" alt=""></a>
					<a href="https://www.instagram.com/infometry_inc/" target="_blank" rel="noopener" aria-label="Infometry on Instagram"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-instagram.png' ); ?>" alt=""></a>
					<a href="https://www.g2.com/sellers/infometry-inc#profiles" target="_blank" rel="noopener" aria-label="Infometry on G2"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-g2.png' ); ?>" alt=""></a>
				</div>
				<a class="infometry-footer-contact" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <span aria-hidden="true">→</span></a>
			</div>
			<nav class="infometry-footer-column" aria-label="Footer products"><h3>Products</h3><a href="<?php echo esc_url( $conversa_url ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( home_url( '/product/google-cloud-connectors/' ) ); ?>">Google (GCP) Connectors For Informatica IDMC</a><a href="<?php echo esc_url( home_url( '/product/global-cloud-connector/' ) ); ?>">Global Connectors For Informatica IDMC</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">INFOFISCUS Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps For IDMC and Matillion</a><a href="<?php echo esc_url( $accelerators_url ); ?>">Accelerators</a></nav>
			<nav class="infometry-footer-column" aria-label="Footer resources"><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></nav>
			<nav class="infometry-footer-column" aria-label="Footer company"><h3>Company</h3><a href="<?php echo esc_url( $customers_url ); ?>">Customers – Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></nav>
		</div>
		<div class="infometry-footer-bottom"><span>© 2026 Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
	</div>
</footer>

<?php get_footer(); ?>
