<template>
  <div class="row" id="chatbox" style="padding-top:1em">
    <div class="col-lg-4 border w-100" v-if="version == 'admin'" style="overflow:auto; padding-left : 0px; padding-right : 0px">
      <div class="row bg-secondary ">
        <div class="col-12 text-white">
            <h3>Konversationen</h3>
        </div>
        <div class="col-12 overflow-auto" style="height: 70vh">
          <div class="card" id="profile-card" v-on:click="changeConID(conversation.id)" v-bind:class="{'bg-light text-black' : conversation.id != chatConversation_id, 'bg-primary text-white' : conversation.id == chatConversation_id}" v-for="conversation in conversations">
            <div class="row no-gutters border">
              <div class="col-sm-4 border-right" id="conversationpicture">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Placeholder_no_text.svg/2000px-Placeholder_no_text.svg.png" class="card-img" alt="Hier sollte ein placeholder sein">
              </div>
              <div class="col-sm ">
                <div class="col-12 border-bottom">
                  <p class="text-red"> Von {{conversation.member1}}<span style="float:right;"> <small>{{conversation.last_message.created_at}}</small></span></p>
                </div>
                <div class="col-12">
                  <p class="card-text">{{cutTheLastMessage(conversation.last_message.message)}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <!--the conversation component index of all conversations -->

    </div>
    <div class="col border border" style="">
      <div  class="row" v-if="chatConversation_id" style="">
        <div class="col-12 bg-secondary text-white">
          <h3>Nachrichtenverlauf</h3>
        </div>

        <hr>
        <div class="col-12 p-0 border-border" id="messagebox" style="width: 100%; height: ">
          <div class="col-12" v-bind:class="{'d-flex justify-content-start p-0': message.direction == 1, 'd-flex justify-content-end p-0' : message.direction == 0}"v-for="message in messages" style="">
            <div  class="alert " v-bind:class="{'alert-info': message.direction == 1, 'alert-success text-right' : message.direction == 0}" style="width: auto">
                {{message.message}}
            </div>
          </div>
        </div>
      </div>

      <div class="row"  v-else-if="version != 'admin'">
        <div class="accordion" id="accordionChat">
          <div class="col-12 ">
            <h4>Funktionsweise <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDescriptionChat" aria-expanded="true" aria-controls="collapseOne"><i class="fas fa-angle-double-down"></i></button></h4>
          </div>
          <div class="col-12 collapse" id="collapseDescriptionChat" aria-labelledby="headingOne" data-parent="#accordionChat">
            <p>Starte eine neue Konversation mit mir indem du einen Namen und ein Key (für die Verschlüsselung) angibst und Konversation starten klickst</p>
              <p>Rufe eine bereits erstellte Konversation über die Konversations-ID und dem Key ab.</p>
          </div>
        </div>

        <div id="UserInput"  class="col-12 border border" style="width: 100%;">
          <div class="row m-2 p-2">
            <div class="col">
              <input type="text" v-model="conversation_id" class="form-control" placeholder="Konversations-ID">

            </div>
          </div>
          <div class="row m-2 p-2">
            <div class="col">
              <input type="text" v-model="conversation_username" class="form-control" placeholder="Name">
            </div>
            <div class="col">
              <input type="text" v-model="conversation_key" class="form-control" placeholder="Key">
            </div>
          </div>
          <div class="row m-2 p-2">
            <div class="col">
              <button type="submit" class="btn btn-primary" v-on:click="getConversation()">Konversation suchen</button>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary" v-on:click="startConversation()">neue Konversation starten</button>
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

          // setInterval(this.test,2000)
        },
        created(){
            this.getConversations()
        },

        methods:{
          changeConID(id)
          {
            this.chatConversation_id = id
            clearInterval(this.timer);
            this.timer = setInterval(() => {
              this.getConversations();
              this.getMessages(this.chatConversation_id);
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
            params.append("key", this.conversation_key)
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
          test()
          {
            // console.log(this.conversations)
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
    background-color: black;
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
