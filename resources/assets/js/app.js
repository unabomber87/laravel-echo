
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./notify');

import Echo from 'laravel-echo'

let e = new Echo({
	broadcaster: 'socket.io',
	host: window.location.hostname + ':6001'
})

e.channel('chan-demo')
 .listen('PostCreatedEvent', (e) => {
 	console.log('PostCreatedEvent', e);
 })

e.join('group.1')
.here(function(users){
	console.log('here', users)
	
})
.joining(function(user){
	$.notify({
		message : user.id + 'viens de se connecter'
	})
	console.log('joining', user)
})
.leaving(function(user){
	console.log('leaving', user)
})
 .listen('GrouWithEvent', (e) => {
 	console.log('GrouWithEvent', e);
 })

e.private('App.User.1')
 .notification(function(notif){
 	console.log(notif)
 })

$(".demo").click(function(e){
	e.preventDefault();
	$.get('/post')
})