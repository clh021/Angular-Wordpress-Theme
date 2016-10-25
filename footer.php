<?php /* ?>
		<footer>
			<nav id="footer">
				<div class="container">
					<div class="pull-left fnav">
						<p>&copy; <?php echo date( 'Y' ); ?> Copyleft <?php bloginfo( 'name' ); ?>. Created by <a href="http://ivanalbizu.eu/">Ivan Albizu</a></p>
					</div>
					<div class="pull-right fnav">
						<?php the_social_menu( "social-menu", "footer-social" ); ?>
					</div>
				</div>
			</nav>
		</footer>
php */ ?>
			<footer class="page-footer cyan darken-3">
			  <div class="container">
				<div class="row">
				  <div class="col l6 s12">
					<h5 class="white-text">Conócenos</h5>
					<p class="grey-text text-lighten-4">
						<?php the_social_menu(); ?>
					</p>
				  </div>
				  <div ng-controller="FooterCtrl as vm" class="col l4 offset-l2 s12">
					<h5 class="white-text">Últimas viviendas en venta</h5>
					<ul ng-if="vm.restApiActive && vm.acfActive">
						<li ng-repeat="item in vm.posts"><a class="grey-text text-lighten-3" href="wordpress/#/comprar-vivienda/{{item.id}}">{{item.title.rendered}} - {{item.fields.venta_precio | currency:"€":0}}</a></li>
					</ul>
				  </div>
				</div>
			  </div>
			  <div class="footer-copyright">
				<div class="container">
				<?php echo date("Y"); ?> &copy; Copyright
				<a class="grey-text text-lighten-4 right" href="http://ivanalbizu.eu/">Maquetaci&oacute;n &amp; Programaci&oacute;n Iv&aacute;n Albizu</a>
				</div>
			  </div>
			</footer>

		<?php wp_footer(); ?>

		<?php the_analytics_script(); ?>

	</body>

</html>
