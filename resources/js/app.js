require("./bootstrap");

/*$('form').on('submit', function(){
    $(this).find('button').attr('disabled',true);
})*/

Echo.channel("messages-channel").listen("MessageWasReceived", data => {
    //console.log(data)
    let message = data.message;
    let html = `
        <span class=" font-weight-blod">
         ${message.id}
        </span>
    
        <span class=" font-weight-blod">
        ${message.name}
        </span>
    
        
        <span class="text-black-50 ">
        ${message.email}
        </span>
    
        
    
        <span class="text-black-50">
        ${message.content}
        </span>

         `;

         $(html).hide().preventTo('li').fadeIn();
});

window.Vue = require("vue");

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app"
});
