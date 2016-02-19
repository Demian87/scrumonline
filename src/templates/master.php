<?php
include __DIR__ . "/../config.php";

?>
<!-- Headline -->
<div class="row">
  <div class="col-xs-12">
    <h1>{{ id }} - {{ name }}</h1>
  </div>
</div>
      
<!-- Poll control -->
<div class="row topic">
  <div class="col-xs-12">
    <ul class="nav nav-tabs">
      <li data-ng-class="{active: currentSource == source}" data-ng-repeat="source in storySources">
        <a class="selectable" data-ng-click="selectSource(source)">{{ source }}</a>
      </li>
    </ul>
    <form role="form">
      <div class="form-group" data-ng-if="currentSource == 'Default'">
        <label for="topic">Story:</label>
        <input type="text" class="form-control" data-ng-model="topic" data-ng-focus="focus=true" placeholder="#4711 Create foo">
      </div>
      <div class="form-group" data-ng-if="currentSource == 'Redmine'">
        <p>Work in progress!</p>
      </div>
      <div class="form-group" data-ng-if="currentSource == 'JIRA'">
        <p>Work in progress! Help wanted on the <a href="https://github.com/Toxantron/scrumonline">github repo.</a></p>
      </div>
      <div class="form-group" data-ng-if="currentSource == '+'">
        <p>Would like to contribute a ticketing system? Check out the <a href="https://github.com/Toxantron/scrumonline">github repo.</a></p>
      </div>
    </form>
    <button class="btn btn-default" data-ng-click="startPoll()">Start</button>
  </div>
</div>
  
<!-- Live poll view -->
<div class="row">
    <div class="card-overview">

      <div data-ng-repeat="vote in votes track by vote.id" class="col-lg-2 col-sm-3 col-xs-4">        
        <div class="card-container">
          <div class="deletable-card">
            <div class="card-flip" data-ng-class="{flipped: flipped}">
              <div class="card front" data-ng-class="{active: vote.active}">
      	       <div data-ng-if="vote.placed" class="inner"><span class="card-label">?</span></div>
              </div>
              <div class="card back" data-ng-class="{active: vote.active, confirmed: consensus}">
    	          <div class="inner"><span class="card-label" data-ng-bind="vote.value"></span></div>
              </div>
            </div>
            <div class="delete-member selectable" data-ng-click="remove(vote.id)">
              <span class="glyphicon glyphicon-remove"></span>
            </div>
          </div>
          <h2 data-ng-bind="vote.name"></h2>
        </div>            
      </div>

    </div>
</div>
            
<div class="row">
  <div class="col-xs-12">
    <h2>Invite members</h1>
    <p>Invite members to join your session. Session id: <strong data-ng-bind="id"></strong></p>
    <p>Or send them this link: <a href="http://<?= $host ?>/#/join/{{ id }}"><?= $host ?>/#/join/{{ id }}</a>
  </div>
</div>
