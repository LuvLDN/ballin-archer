</div>

<!-- Footer for tours -->
	<div class="layout-footer page-bar btn-group btn-group-three" style="display: none" ng-show="currentTour">
		<button class="btn btn-default" ng-click="prevTour()"><i class="icon-chevron-left"></i> Back</button>
		<button class="btn btn-primary" ng-click="signup()"><i class="icon-user"></i> Sign Up</button>
		<button class="btn btn-default" ng-click="nextTour()">Next <i class="icon-chevron-right"></i></button>
	</div>

	<div class="layout-content layout-fixed" style="display: none" ng-show="view == 'signup'">
		<div class="layout-content-container full-height">
			Sign up
		</div>
	</div>

	<!-- Footer for signup -->
	<div class="layout-footer page-bar btn-group" style="display: none" ng-show="view == 'signup'">
		<button class="btn btn-default" ng-click="goHome()"><i class="icon-home" style="float: none !important;"></i> Home</button>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js" type="text/javascript"></script>
	<script src="js/ll.js" type="text/javascript"></script>
	<script src="js/controllers/hometour.js" type="text/javascript"></script>
</body>
</html>