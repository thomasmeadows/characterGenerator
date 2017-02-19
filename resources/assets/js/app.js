
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.rwc = require('random-weighted-choice');
window.md5 = require('browser-md5');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

const characterClassesWeighted = {
  warrior: [
    {id:'str', weight: 35},
    {id:'dex', weight: 20},
    {id:'con', weight: 25},
    {id:'wis', weight: 5},
    {id:'int', weight: 5},
    {id:'cha', weight: 10}
  ],
  wizard: [
    {id:'str', weight: 5},
    {id:'dex', weight: 5},
    {id:'con', weight: 10},
    {id:'wis', weight: 20},
    {id:'int', weight: 35},
    {id:'cha', weight: 25}
  ],
  cleric: [
    {id:'str', weight: 20},
    {id:'dex', weight: 5},
    {id:'con', weight: 25},
    {id:'wis', weight: 35},
    {id:'int', weight: 10},
    {id:'cha', weight: 10}
  ]
}
const generateStats = function() {
  const characterClass = $('#class').val();
  const characterBase = {
    str: 10,
    dex: 10,
    con: 10,
    wis: 10,
    int: 10,
    cha: 10
  }
  for (var i = 0; i < 30; i++) {
    statToIncrease = rwc(characterClassesWeighted[characterClass]);
    characterBase[statToIncrease]++;
  }
  Object.keys(characterBase).forEach(key => {
    $('#_' + key).val(characterBase[key]);
    $('#' + key).html(characterBase[key]);
  })
  console.log(characterBase);
}
const generateAvatar = function() {
  $.ajax({
    url: '/random-character-image',
    dataType: 'json',
    success: function(data) {
      const image = data.data.results[0].thumbnail.path + '.' + data.data.results[0].thumbnail.extension;
      $('#_image').val(image);
      $('#image').html('<img style="width: 100%" src="' + image + '">');
    }
  });
}

$(function() {
  generateStats();
  generateAvatar();
  $('#class').change(generateStats);
  $('#generate-stats').click(generateStats);
  $('#generate-avatar').click(generateAvatar);
});
