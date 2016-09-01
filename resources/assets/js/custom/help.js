(function () {
    'use strict';

    angular
        .module('app.controllers')
        .controller('HelpController', HelpController);

    HelpController.$inject = [];

    /* @ngInject */
    function HelpController() {
        var vm = this;
        vm.heading = 'Help Page';
        vm.helpText = 'Please follow the steps mentioned below to use the Temperature Conversion Calculator:';
        vm.helpSteps = [];
        vm.helpSteps.push('Enter temperature in Fahrenheit to have it converted to Celsius');
        vm.helpSteps.push('Enter temperature in Celsius to have it converted to Fahrenheit');
        vm.helpSteps.push('Click "Save Log" button in-case you want to save the conversion to DB');
        vm.helpSteps.push('Please use the Navigation bar to switch between pages');

        activate();

        ////////////////

        function activate() {

        }
    }

})();