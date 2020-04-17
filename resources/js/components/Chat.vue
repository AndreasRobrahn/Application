<template>
  <div class="row" id="chatbox" style="padding-top:1em; height: 50em">
    <div class="col-sm-4 border border" v-if="version == 'admin'">
      Konversationen
      <hr>
        <div class="card mb-3" id="profile-card" style="max-width: auto;"  v-on:click="changeConID(conversation.id)" v-bind:class="{'bg-light text-black' : conversation.id != chatConversation_id, 'bg-primary text-white' : conversation.id == chatConversation_id}" v-for="conversation in conversations">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Placeholder_no_text.svg/2000px-Placeholder_no_text.svg.png" class=" card-img" alt="Hier sollte ein placeholder sein">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{conversation.member1}}</h5>
                <p class="card-text">{{conversation.last_message.message}}</p>
                <p class="card-text"><small>{{conversation.last_message.created_at}}</small></p>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col border border">
      <div  class="row" v-if="chatConversation_id">
        Nachrichtenverlauf
        <hr>
        <div id="messagebox"  class="border border" style="width: 100%;">
          <div v-bind:class="{'d-flex justify-content-start p-1': message.direction == 1, 'd-flex justify-content-end p-1' : message.direction == 0}"v-for="message in messages">
            <div  class="alert " v-bind:class="{'alert-info': message.direction == 1, 'alert-light text-right' : message.direction == 0}" style="width: auto">

                {{message.message}}

            </div>
          </div>
        </div>
      </div>
      <div  class="row" v-else-if="version != 'admin'">
        Bitte gebe die Conversation-ID an oder starte eine neue
        <div id="UserInput"  class="border border" style="width: 100%;">
          <div class="row m-2 p-2">
            <div class="col">
              <input type="text" v-model="conversation_username" class="form-control" placeholder="Username">
            </div>
          </div>
          <div class="row m-2 p-2">
            <div class="col">
              <input type="text" v-model="conversation_id" class="form-control" placeholder="Konversations ID">
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
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: red;
      color: white;
      text-align: center;">
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
      <div class="row-auto border border" id="messageInput" v-if="chatConversation_id">


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
            conversations: null
          }
        },

        mounted() {
          console.log('chat mounted, version:' + this.version)
          if(this.version == 'admin')
          {
            setInterval(this.getConversations,2000)
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
            this.getMessages(id)
          },
          getMessages(conid)
          {
            axios
              .get("/messages/conId/"+conid)
              .then(response => {
                this.messages = response.data
              })
              .catch(function(error) {
                console.log(error);
              });
          },
          getConversations(){
            axios
              .get("/conversations")
              .then(response => {
                this.conversations = response.data;
                // console.log(this.conversations);
                // return response.data

              })
              .catch(function(error) {
                console.log(error);
              });
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
              console.log(error);
            });
            console.log('axios')

          },
          getConversation()
          {
            let key = conversation_key
            let conid = conversation_id
            alert(this.id)
            axios.
            post('/startConversation', params)
            .then(response => {
              this.changeConID(response.data)

            })
            .catch(function(error) {
              console.log(error);
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
#profile-card
{
  height:8em;
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

@media(min-height: 701px) and (max-height:980px)
{
  #messagebox
  {
    background-color: black;
    height : 35em;
  }
}
@media(min-height: 301px) and (max-height: 700px)
{
  #messagebox
  {
    background-color: black;
    height : 20em;
  }
}
@media(max-height: 300px)
{
  #messagebox
  {
    background-color: red;
    height : 15em;
  }
}

</style>
