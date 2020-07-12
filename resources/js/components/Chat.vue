<template>
  <div class="row text-center" id="chatbox" style="height: 72vh">
    <div class="col-lg-4 border w-100" v-if="version == 'admin'" style="overflow:auto; padding-left : 0px; padding-right : 0px">
      <div class="row bg-secondary ">
        <div class="col-12 text-white">
            <h3>Konversationen</h3>
        </div>
        <div class="col-12 overflow-auto" style="height: 70vh">
          <div class="card" id="profile-card" v-on:click="changeConID(conversation.id)" v-bind:class="{'bg-light text-black' : conversation.id != chatConversation_id, 'bg-primary text-white' : conversation.id == chatConversation_id}" v-for="conversation in conversations">
            <div class="row no-gutters border">
              <div class="col-sm-4 border-right" id="conversationpicture">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Placeholder_no_text.svg/2000px-Placeholder_no_text.svg.png" class="card-img rounded-pill" alt="Hier sollte ein placeholder sein">
              </div>
              <div class="col-sm ">
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
    <div class="col-lg-4 border w-100" v-else style="overflow:auto; padding-left : 0px; padding-right : 0px">
      <div class="row bg-secondary ">
        <div class="col-12 text-white">
            <h3>Chatter</h3>
        </div>
        <div class="col-12 overflow-auto" style="height: 70vh">
          <div class="card bg-info text-white" id="profile-card" v-for="chatter in chatters">
            <div class="row no-gutters border">
              <div class="col-sm-4 border-right" id="conversationpicture">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Placeholder_no_text.svg/2000px-Placeholder_no_text.svg.png" class="card-img" alt="Hier sollte ein placeholder sein">
              </div>
              <div class="col-sm ">
                <div class="col-12 border-bottom">
                  <p class="text-left">{{chatter.username}}<span style="float:right;"> <small>test</small></span></p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col border border-white-3 text-center" style="top: 0%">
      <div  class="row" v-if="chatConversation_id" style="">
        <div class="col-12 bg-secondary text-white p-0">
          <h3>Nachrichtenverlauf <button class="btn btn-outline bg-dark text-white btn-sm" v-on:click="logout()"style="float: right"> Logout</button></h3>
        </div>
        <div class="col-12 bg-dark" id="messagebox" style="width: 100%; height: ">
          <div class="col-12" v-bind:class="{'d-flex justify-content-start p-0': message.username != conversation_username, 'd-flex justify-content-end p-0' : message.username == conversation_username}"v-for="message in messages" style="">
            <div  class="row mt-1" v-bind:class="{'bg-info': message.username == conversation_username, 'bg-secondary text-right' : message.username != conversation_username }" style="width: auto">
              <div class="col-12 text-left bg-dark">
                <small>{{message.username}} </small> <small style="float: right; padding-top: 4px"> {{message.created_at}} </small>
              </div>
              <div class="col-12 text-left text-dark bg-light">
                  {{message.decrypted_message}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-center"  v-else-if="version != 'admin'">

        <div id="UserInput"  class="col-12" style="width: 100%;">
          <div class="row m-2 p-2">
          </div>
          <div class="row m-2 p-2">
            <div class="col">
              <input type="text" v-model="conversation_username" class="form-control" placeholder="dein Name">
            </div>
          </div>
          <div class="row m-2 p-2">
            <div class="col">
              <button type="submit" class="btn btn-primary" v-on:click="getIntoConversation()">am Chat teilnehmen</button>
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
            var params = new URLSearchParams()

            params.append("username", username)
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
#messagebox
{
  overflow : scroll;
  height : 35em;
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
</style>
