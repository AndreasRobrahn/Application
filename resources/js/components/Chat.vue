<template>
  <div class="row m-0 h-100 text-center" id="chatbox" style="">
    <div class="col-sm border-white-3"  v-if="version == 'admin'" style="overflow:auto; padding-left : 0px; padding-right : 0px">
      <div class="row bg-secondary">
        <div class="col-12 text-white">
            <h3>Konversationen</h3>
        </div>
        <div class="col-12 overflow-auto" style="">
          <div class="card " id="profile-card" v-bind:class="{'bg-light text-black' : conversation.id != chatConversation_id, 'bg-primary text-white' : conversation.id == chatConversation_id}" v-for="conversation in conversations">
            <div class="row no-gutters border">
              <div class="col-sm-4 " id="conversationpicture">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Placeholder_no_text.svg/2000px-Placeholder_no_text.svg.png" class="card-img rounded-circle" alt="Hier sollte ein placeholder sein">
              </div>
              <div class="col-sm-8 ">
                <div class="col-12 border-bottom">
                  <p class="text-red"> Von {{conversation.member1}}<span style="float:right;"> <small>{{conversation.last_message.created_at}}</small></span></p>
                </div>
                <div class="col-12">
                  <p class="card-text">{{cutTheLastMessage(conversation.last_message.decrypted_message)}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md d-sm-none d-md-block m-1 box-shadow-white h-100" id="chattersbox" v-else style="overflow:hidden;">
      <div class="row m-0 ">
          <h5 class="text-white w-100 text-center">Chatter </h5>
      </div>
      <div class="row m-0" style="height:95%; overflow-y: scroll;">

        <div class="col-12 p-1"  style=" position: relative; width: 100%; height:100%;">
          <div class="card m-1 box-shadow-white" id="profile-card" v-for="chatter in chatters">
            <div class="row no-gutters ">
              <div class="col-sm-4 p-1 center_items" id="conversationpicture">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Placeholder_no_text.svg/2000px-Placeholder_no_text.svg.png" class="img2 border border-dark rounded-circle box-shadow-white" alt="Hier sollte ein Avatarbild erscheinen" v-if="!chatter.avatarimg">
                <img :src=" 'ConImg/' + chatter.avatarimg" class="img2 border border-dark rounded-circle box-shadow-white" alt="Hier sollte ein placeholder sein" v-else>
              </div>
              <div class="col-sm p-0">
                <div class="col-12 p-0 d-flex align-items-center">
                  <div class="wrapper ml-2 p-1 text-left">
                    <span class="text-left">{{chatter.username}}</span><br>
                    <small><span class="text-left">{{chatter.motto}}</span></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 box-shadow-white m-1 text-center" id="chatbox" style="height:100%;">
      <div  class="row" v-if="chatConversation_id" style="">
        <div class="col-12 p-0">
          <h3>Nachrichtenverlauf <button class="btn btn-outline bg-dark text-white btn-sm" v-on:click="logout()"style="float: right"> Logout</button></h3>
        </div>
        <div class="col-12" id="messagebox" style="position: relative; width: 100%; height:54vh">
          <div class="row m-1" v-bind:class="{'d-flex justify-content-start p-0': message.username != conversation_username, 'd-flex justify-content-end p-0' : message.username == conversation_username}"v-for="message in messages" style="">
            <div class="d-block border-rounded " v-bind:class="{'chatbubble2 box-shadow-white text-right': message.username == conversation_username, 'chatbubble text-left box-shadow-white' : message.username != conversation_username }" style="">
              <div class="row m-0">
                <div class="col p-0 text-dark">
                  <p>
                    {{message.decrypted_message}}
                  </p>
                </div>
              </div>
              <hr>
              <div class="row m-0">
                <div class="col p-0 text-dark">
                  {{message.username}} <small> {{message.created_at}} </small>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      <div class="row h-100 center_items"  v-else-if="version != 'admin'">
        <div id="UserInput"  class="col-10" style="width: 100%;">
          <div class="row m-1">
              <h5 class="w-100 text-center">Erstell dir deinen Avatar:</h5>
          </div>

          <div class="row m-1 text-left">
            <div class="col-6 p-0 center_items">
              <div class="">
                <label for="name">Name:</label><br>
                <input type="text" id="name" v-model="conversation_username" class="input1" placeholder="Andi..."><br>
                <label for="motto">Motto:</label><br>
                <input type="text" id="motto" v-model="conversation_motto" class="input1" placeholder="Carpe Noctem...">
              </div>

            </div>
            <div class="col-6 center_items">
              <label class="w-100 h-100 d-flex align-items-end" for="picture">
                <div class="border-white center_items text-center position-relative" style="height: 75%; width: 60%; border-radius:5%;">
                  <img src="https://www.nicepng.com/png/detail/741-7413169_placeholder-female.png" id="avatarPicMenu" class="position-absolute h-100 w-100" alt="Placeholder">
                  <p class="position-absolute text-dark">Wähle dein Bild</p>
                </div>
              </label>
              <input type="file" id="picture" class="input1" style="display:none" accept=".png,.jpg,.jpeg" @change="loadPreview($event)"><br>

            </div>
          </div>
          <hr class="m-4">
          <div class="row m-1 center_items">
            <div class="col-10  p-0 ">
              <button type="submit" class="btn btn-block bg-border border border-white" v-on:click="createUser()">am Chat teilnehmen</button>
            </div>
          </div>
        </div>
      </div>
      <div class="footer" style="
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;" v-if="chatConversation_id">
        <div class="input-group">
            <div class="input-group-prepend" style="width: auto">
              <span class="input-group-text">deine <br> Nachricht</span>
            </div>
            <textarea class="form-control" v-model="message" v-on:keyup.enter="sendMessage(chatConversation_id)" id="textarea" value=""></textarea>
            <div class="input-group-append">
              <span class="input-group-text">
                    <button class="btn btn-outline-secondary" type="button" v-on:click="sendMessage(chatConversation_id)" id="button-addon1">Senden</button>
              </span>
            </div>
          </div>
      </div>
  </div>
</div>
</template>

<script>
    export default {

      props:  ['version'],

        data: function(){
          return {
            messages: null,
            chatConversation_id: null,
            message: '',
            conversation_username: '',
            conversation_motto: '',
            conversation_picture: '',
            conversation_id: '',
            conversation_key: '',
            conversations: null,
            timer: null,
            chatters: null,
          }
        },
        computed: {
          tester(){

            // this.test()
          }
        },
        mounted() {
          console.log('chat mounted, version:' + this.version)
          if(this.version == 'admin')
          {
            this.timer = setInterval(() => {
              this.getConversations();
            },2000);
          }
          else{
            this.timer = setInterval(() => {
              this.getUsers();
            },2000);

          }


          // setInterval(this.test,2000)
        },
        created(){
          window.addEventListener("beforeunload", () => {

            this.logout()
            return null;
          });

        },

        methods:{
          changeConID(id)
          {
            this.chatConversation_id = id
            clearInterval(this.timer);
            this.timer = setInterval(() => {
              // this.getConversations();
              this.getMessages(this.chatConversation_id);

              if(this.version == 'user')
              {
                this.getUsers();
              }

            }, 3000);

          },
          createUser(){
            var host = window.location.host;
            var self = this
            var formData = new FormData();

            formData.append('username',this.conversation_username)
            formData.append('motto', this.conversation_motto)


            if( document.getElementById("picture").files.length > 0 )
            {
              let image = $('#picture').prop('files')[0];
              // console.log(image)
              formData.append('image', image)
            }

            // console.log( this.conversation_username)

            axios.post('/joinConversation', formData,{
            headers: {
              'Content-Type': 'multipart/form-data'
            }},formData)
             .then(response => {
               // this.checkAvatar(this.user)
               console.log(response.data)
               this.changeConID(1)
               this.getUsers()
               setInterval(this.getMessages(this.chatConversation_id),2000)
             })
             .catch(error => {
               console.log(error.response);
               // console.log(error);
             })
          },
          loadPreview(event){
            let preview = $('#avatarPicMenu')
            // console.log(preview)
            let imgsrc = URL.createObjectURL(event.target.files[0]);
            preview.attr("src",imgsrc);
            preview.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
              }
          },
          getMessages(conid)
          {
            axios
              .get("/messages/conId/"+conid)
              .then(response => {
                this.messages = response.data
              })
              .catch(function(error) {
                console.log(error.response);
              });
          },
          getConversations(){
            // console.log('test timer')
            axios
              .get("/conversations")
              .then(response => {
                this.conversations = response.data;
                // console.log(this.conversations);
                // return response.data

              })
              .catch(function(error) {
                console.log(error.response);
              });
          },
          cutTheLastMessage(message)
          {
            if(message.length > 30)
            {
              return message.substring(0, 30) + '...'
            }
            else {
              return message
            }
          },
          sendMessage(id){
            if(!id)
            {
              alert('keine Konversation gewählt')
            }
            else if(!this.message )
            {
              alert('keine nachricht eingegeben')
            }
            else
            {
              let message = this.message

              var params = new URLSearchParams()
              params.append("conid", id)
              params.append("message", message)
              if(this.version == 'admin')
              {
                params.append("admin", 1)
                params.append("username", 'admin')
              }
              else
              {
                params.append("username", this.conversation_username)
              }

              axios.
              post('/sendMessage', params)
              .then(response => {
                this.getMessages(id)
                this.message = ''
               }).catch(function(error) {
                  console.log(error);
                });
            }

            // console.log(this.message)
          },
          startConversation(){

            if(!this.conversation_username)
            {
              alert('bitte username eingeben, dieser wert ist notwendig')
              return 0
            }
            if(!this.conversation_key)
            {
              alert('bitte key eingeben, dieser wert ist notwendig')
              return 0
            }

            let user = this.conversation_username
            let key = this.conversation_key

            var params = new URLSearchParams()
            params.append("user", user)
            params.append("key", key)

            axios.
            post('/startConversation', params)
            .then(response => {
              this.changeConID(response.data)
              setInterval(this.getMessages(this.chatConversation_id),2000)
            })
            .catch(function(error) {
              console.log(error.response.data.message)
            });

            //console.log('axios')

          },
          getConversation()
          {
            var params = new URLSearchParams()
            params.append("conid", this.conversation_id)
            params.append("user", this.conversation_username)

            axios.
            post('/getConversation', params)
            .then(response => {
              if(response.data == 0)
              {
                console.log(response.data)
                alert('konversation nicht gefunden')
              }
              else {
                console.log(response.data)
              }
              this.changeConID(response.data)
            })
            .catch(function(error) {
              console.log(error.response.data.message);
            });
          },
          getIntoConversation()
          {
            window.addEventListener("beforeunload", () => {

              this.logout()
              return null;
            });

            let username = this.conversation_username
            let motto = this.conversation_motto
            let pic = this.pictue

            var params = new URLSearchParams()

            params.append("username", username)
            params.append("motto", motto)



            axios.
            post('/joinConversation', params)
            .then(response => {

              if(response.data == 1)
              {
                alert('username bereits vergeben')
              }

              else
              {
                this.changeConID(1)
                this.getUsers()
                setInterval(this.getMessages(this.chatConversation_id),2000)
              }

            })
            .catch(function(error) {
              console.log(error.response.data.message)
            });

          },
          getUsers()
          {
            axios.
            post('/getUsers')
            .then(response => {
              if(response.data)
              {
                // this.changeConID(response.data)
                // this.chatters = response.data
                // console.log(response.data)÷\
                this.chatters = response.data
              }
              else {
                console.log(response.data)
              }

            })
            .catch(function(error) {
              console.log(error.response.data.message);
            });
          },
          logout()
          {
            if(this.conversation_username)
            {
              var params = new URLSearchParams()

              params.append("username", this.conversation_username)

              axios.
              post('/logoutChat', params)
              .then(response => {
                if(response.data == 1)
                {
                  alert('etwas ist schiefgelaufen')
                  console.log(response.data)
                }
                else {
                  this.getUsers()
                  this.chatConversation_id = null
                  this.conversation_username = ''
                }})
              .catch(function(error) {
                console.log(error.response.data.message);
              });
            }

          },
          test()
          {

            //a function to kick you out of a conversation if you havent done anything in 5 minutes
          }
        }
    }
</script>
<style>
.img2
{
  height: 90%;
  width: 100%;
  padding: 1px;
  object-fit: cover;
}
.left
{
  padding-left : 3%;
  color: white;
}
.right
{
  padding-left : 89%;
  color: white;
}
#chatbox
{
  height: 90%
}
#messageInput
{
  position: relative;
  bottom:0%;
  width: 100%;

}
#chattersbox
{
  /* overflow: auto; */
  height : auto;
}
#messagebox
{
  overflow: auto;
  height : auto;
}
#profile-card
{
   background: rgba(0,0,0, 0.25);
   color: white;
   font-size: 1.1em;
   font-weight: 650;
}
#profile-card:hover
{
   background: rgba(0,0,0, 0.9);
}
.chatbubble {
	position: relative;
	background: #e2ceee;
	border-radius: .4em;
  margin-top: .25rem;
  margin-bottom: .25rem;
  border-radius: .5rem;
    border-bottom-right-radius: 0.5rem;

  padding: 1rem;
}
.chatbubble2 {
	position: relative;
	background: rgba(255,113,0,0.8);
	border-radius: .4em;
  margin-top: .25rem;
  margin-bottom: .25rem;
  border-radius: .5rem;
    border-bottom-right-radius: 0.5rem;

  padding: 1rem;
}


/* for tablets etc. */

@media only screen and (min-height: 601px)
{
  #profile-card
  {
    height: auto;
    margin: 0 0 0 0;
  }
}
@media only screen and (max-height: 600px)
{
  #messagebox
  {
    background-color: ;
    height : 20em;
  }
  #conversationpicture
  {
    display : none;
  }
  #profile-card
  {
    left:0;
    padding: 0;
    margin: 0;
  }
}
@media only screen and (min-width:400px) and (max-width: 960px)
{
  #conversationpicture
  {
    display : none;
  }
}
@media only screen and (min-height: 415px)
{
  #chattersbox
  {
    display: none;
  }
}
</style>
