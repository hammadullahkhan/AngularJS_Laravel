(function () {
    'use strict';

    angular
        .module('app.controllers')
        .controller('NavigationController', NavigationController);

    NavigationController.$inject = ['$location'];

    /* @ngInject */
    function NavigationController($location) {
        var vmNav = this;
        vmNav.nav = {
            home: 'home',
            help: 'help'
        };
        vmNav.activeTabName = 'home';

        activate();

        ////////////////

        function activate() {

        }

        vmNav.currentTab = function (activeTabName) {

            vmNav.activeTabName = activeTabName;
        };

        vmNav.checkNav = function (viewLocation) {
            if ( vmNav.activeTabName !== $location.path().substring(1) ) {
                $location.url(vmNav.activeTabName);
            }
        };

        vmNav.checkNav();
    }

})();
