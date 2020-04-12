<template>
  <div class="row" style="padding-top:1em">

    <div class="col-sm-4 mb-2 border border" v-if="version == 'admin'">
      Konversationen
      <div class="list-group">
        <li class="list-group-item list-group-item-action" v-on:click="changeConID(conversation.id)" v-bind:class="{active : conversation.id == chatConversation_id}" v-for="conversation in conversations"> {{conversation.member1}} </li>
      </div>
      <!-- <ul class="list-group">
        <li class="list-group-item" v-for="conversation in conversations"> {{conversation.member1}} </li>
      </ul> -->
    </div>

    <div class="col border border">

      <div  class="row" v-if="chatConversation_id">
        Nachrichtenverlauf
        <div id="messagebox"  class="border border" style="width: 100%;">
          <div v-bind:class="{'d-flex justify-content-start p-1': message.direction == 1, 'd-flex justify-content-end p-1' : message.direction == 0}"v-for="message in messages">
            <div  class = "card text-white" v-bind:class="{'bg-secondary': message.direction == 1, 'bg-primary text-right' : message.direction == 0}" style="width: 90%">
              <div class="card-body">
                {{message.message}}
              </div>
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
              <button type="submit" class="btn btn-primary">Konversation suchen</button>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary" v-on:click="startConversation()">neue Konversation starten</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row-auto border border" id="messageInput" v-if="chatConversation_id">
          <div class="input-group">
            <div class="input-group-prepend" style="width: auto">
              <span class="input-group-text">deine <br> Nachricht</span>
            </div>
            <textarea class="form-control" v-model="message" v-on:keyup.enter="sendMessage(chatConversation_id)" id="textarea" value=""></textarea>
            <div class="input-group-append">
              <span class="input-group-text">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1">Senden</button>
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
            conversations: null,
            chatConversation_id: null,
            message: '',
            conversation_username: '',
            conversation_id: '',
            conversation_key: '',
          }
        },
        computed:{
          activeConversation(){

          }
          // conversationsComputed(){
          //     axios
          //       .get("/conversations")
          //       .then(response => {
          //         this.conversations = response.data
          //         return this.conversations
          //       })
          //       .catch(function(error) {
          //         console.log(error);
          //       });
          //     }
        },
        mounted() {
          this.getConversations()
          // console.log($('meta[name="csrf-token"]').attr('content'))

          // var params3 = new URLSearchParams();
          // params3.append("id", data);

        },
        created(){

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
                this.conversations = response.data
                return this.conversations
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
            else
            {
              let message = this.message

              var params = new URLSearchParams()
              params.append("conid", id)
              params.append("message", message)

              if(this.version)
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

            })
            .catch(function(error) {
              console.log(error);
            });

            console.log('axios')

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
