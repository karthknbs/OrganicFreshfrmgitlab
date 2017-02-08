var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('chat-channel', function(err, count) {
});
redis.subscribe('user-channel', function(err, count) {
});
redis.subscribe('post-channel', function(err, count) {
});
redis.subscribe('comment-channel',function (err, count) {

});

redis.on('message', function(channel, message) {
    message = JSON.parse(message);
    io.emit('chat-channel'+":"+message.event, message.data);
    io.emit('user-channel'+":"+message.event,message.data);

    //console.log(message.data);

    io.emit('post-channel'+":"+message.event,message.data);
    io.emit('comment-channel'+":"+message.event,message.data);
});

http.listen(8890, function(){
    console.log('Listening on Port 8890');
});