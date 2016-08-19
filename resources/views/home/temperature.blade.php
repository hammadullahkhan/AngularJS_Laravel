@extends('layouts.main')

@section('content')

<div ng-controller="NavigationController as vmNav" class="collapse navbar-collapse">
    <ul class="nav nav-pills">
        <li ng-class="{ active: vmNav.activeTabName === 'home'}" ng-click="vmNav.currentTab(vmNav.nav.home)" role="presentation" class="active"><a href="#home">Temperature Converter</a></li>
        <li ng-class="{ active: vmNav.activeTabName === 'help'}" ng-click="vmNav.currentTab(vmNav.nav.help)" role="presentation"><a href="#help">Help</a></li>
    </ul>

    <div ng-if="vmNav.activeTabName == 'home'">
        <div ng-controller="TemperatureController as vm">
            <div class="container-fluid">

                <div class="row">
                    <h1 ng-bind="::vm.heading"></h1>
                </div>

                <div class="row">
                    <div class="col-md-offset-3 col-md-6"><h5 ng-bind="::vm.msgText"></h5></div>
                </div>
                <hr>
                <br />

                <div class="row">
                    <div id="message" class="col-md-offset-3 col-md-6"><h5 ng-bind="vm.message"></h5></div>
                </div>
                <br />

                <div class="row">
                    <div class="col-md-offset-3 col-md-2"><input type="number" ng-model="vm.fahrenheit" ng-blur="vm.convertToCelsius()"><br><span ng-bind="vm.lableFahrenheit"></span></div>
                    <div class="col-md-1" style="padding-left: 5%; padding-right: 5%"><span ng-bind="vm.seperator"></span></div>
                    <div class="col-md-2"><input type="number" ng-model="vm.celsius" ng-blur="vm.convertToFahrenheit()"><br><span ng-bind="vm.lableCelsius"></span></div>
                </div>
                <br />

                <div class="row">
                    <div class="col-md-offset-3 col-md-2"></div>
                    <div class="col-md-1"><button class="btn btn-primary" ng-click="vm.saveToDB()"><span ng-bind="vm.lableSave"></span></button></div>
                    <div class="col-md-2"></div>
                </div>

            </div>
        </div>
    </div>

    <div ng-if="vmNav.activeTabName == 'help'">
        <div ng-controller="HelpController as vm">
            <div class="container-fluid">

                <div class="row">
                    <h1 ng-bind="::vm.heading"></h1>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12" ng-bind="vm.helpText"></div>
                </div>
                <br />

                <div class="row">
                    <div ng-repeat="step in vm.helpSteps">
                        <pre class="col-md-12" ng-bind="step" style="text-align: left"></pre>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>






@endsection