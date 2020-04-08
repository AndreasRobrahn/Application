<template>
    <div class="container">
      <div class="row">
        <div class="col">
          <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
              <a class="nav-link" :class="{'active'  : active_tab == 1}" v-on:click="changeTab(1)">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" :class="{'active'  : active_tab == 2}" v-on:click="changeTab(2)">User Rechte festlegen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" :class="{'active'  : active_tab == 3}" v-on:click="changeTab(3)">der Aufgabenbereich nach festgelegten Rechten</a>
            </li>
          </ul>
        </div>
      </div>
    <div class="row">
      <div class="col">
        <div class="d-flex flex-column" v-if="active_tab == 1">
          <div class="container mt-2">
            <div class="row">
              <div class="col-6 p-2">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input v-model="username" v-on:keyup.enter="createUser()" type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  </div>
                  <div class="form-group">
                    <label for="test">Email (optional)</label>
                    <input v-model="email" type="email" class="form-control" name="email" id="email">
                  </div>
                  <button class="btn btn-primary" v-on:click="createUser()">Test User anlegen</button>
                </div>
              <div class="col-6 p-2">
                <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Rechte</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users">
                       <th scope="row"></th>
                       <td>{{user.username}}</td>
                       <td>{{user.email}}</td>
                       <td>{{user.rightsarray}}</td>
                     </tr>
                  </tbody>
                </table>
              </div>

            </div>

          </div>
        </div>
        <div class="d-flex flex-column" v-else-if="active_tab == 2">
          <div class="container mt-2">
            <div class="row">
              <div class="col p-2">
                <table class="table table-dark table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">User</th>
                      <th colspan="2">Aufgabe1</th>
                      <th colspan="2">Aufgabe2</th>
                      <th colspan="2">Aufgabe3</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users">
                      <th scope="row">{{user.username}}</th>
                      <td><input class="form-check-input" type="checkbox" id='task1' data-task="task1" data-right="read" :data-userid="user.id" v-model="checkedRights" :value="user.username + '1'">lesen</td>
                      <td><input class="form-check-input" type="checkbox" id="task1" data-task="task1" data-right="write" :data-userid="user.id" v-model="checkedRights" :value="user.username + '2'">bearbeiten</td>
                      <td><input class="form-check-input" type="checkbox" id="task2" data-task="task2" data-right="read" :data-userid="user.id" v-model="checkedRights" :value="user.username + '3'">lesen</td>
                      <td><input class="form-check-input" type="checkbox" id="task2" data-task="task2" data-right="write" :data-userid="user.id" v-model="checkedRights" :value="user.username + '4'">bearbeiten</td>
                      <td><input class="form-check-input" type="checkbox" id="task3" data-task="task3" data-right="read" :data-userid="user.id" v-model="checkedRights" :value="user.username + '5'">lesen</td>
                      <td><input class="form-check-input" type="checkbox" id="task3" data-task="task3" data-right="write" :data-userid="user.id" v-model="checkedRights" :value="user.username + '6'">bearbeiten</td>
                    </tr>

                </tbody>

              </table>
              <button type="button" class="btn btn-secondary btn-lg btn-block" v-on:click="setUserRights()">Rechte festlegen</button>

              </div>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column" v-else-if="active_tab == 3">
          <div class="row pt-4 ">
            <div class="col text-center">
              Eingeloggt als User:
              <div class="custom-control custom-radio custom-control-inline" v-for="user in users">
                <input type="radio" id="user" :id="user.id" name="user" v-on:click="changeCurrentUser(user)" class="custom-control-input">
                <label class="custom-control-label" for="user" :for="user.id">{{user.username}}</label>
              </div>
            </div>
          </div>
          <div class="row pt-4" v-if="current_user">
            <div class="col-4">
              <div class="card" v-if="checkUserRights(current_user,'task1_read')">
                <div class="card-header">
                  Aufgabe 1
                </div>
                <div class="card-body">
                  <h5 class="card-title">Beispielaufgabe, lesbar und bearbeitbar mit den entsprechenden Rechten</h5>
                    <textarea class="form-control" v-model="message" id="textarea" :disabled="disabled('task1_write')">
                    </textarea>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card" v-if="checkUserRights(current_user,'task2_read')">
                <div class="card-header">
                  Aufgabe 2
                </div>
                <div class="card-body">
                  <h5 class="card-title">Beispielaufgabe, lesbar und bearbeitbar mit den entsprechenden Rechten</h5>
                  <textarea class="form-control" v-model="message2" id="textarea" :disabled="disabled('task2_write')">
                  </textarea>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card" v-if="checkUserRights(current_user,'task3_read')">
                <div class="card-header" >
                  Aufgabe 3
                </div>
                <div class="card-body">
                  <h5 class="card-title">Beispielaufgabe, lesbar und bearbeitbar mit den entsprechenden Rechten</h5>
                  <textarea class="form-control" v-model="message3" id="textarea" :disabled="disabled('task3_write')">
                  </textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</template>

<script>
    export default {
      data: function(){
        return {
          active_tab: 1,
          users: null,
          current_user: null,
          rights: null,
          user_roles: null,
          username: 'dein username',
          email:'',
          rights: null,
          checkedRights: [],
          message: 'Dies ist eine Beispielaugabe, der Text kann entsprechend ihrer Rechte bearbeitet werden"',
          message2: 'Dies ist eine Beispielaugabe, der Text kann entsprechend ihrer Rechte bearbeitet werden"',
          message3: 'Dies ist eine Beispielaugabe, der Text kann entsprechend ihrer Rechte bearbeitet werden"',
          isDisabled1: false
        }
      },
      computed:{


      },
        mounted() {
            this.getUsers()
        },

        methods:{

          disabled(right){
            if(this.checkUserRights(this.current_user, right))
            {
              return false;
            }
            else
            {
              return true;
            }
          },

          changeTab(val){
            // console.log(val)
            this.current_user = null
            this.active_tab = val
          },
          getUsers(){
            axios
              .get("/users/index")
              .then(response => {
                // console.log(response.data)
                this.users = response.data
              })
              .catch(function(error) {
                console.log(error);
              });
          },
          createUser()
          {
            var params = new URLSearchParams()
            if(this.username)
            {
              params.append("username", this.username)

              if(this.email)
              {
                params.append("email", this.email)
              }
              else
              {
                params.append("email", 0)
              }

              axios
                .post("/user/create", params)
                .then(response => {
                  if(response.data == 'too many users')
                  {
                    alert('keine weiteren user moglich')
                  }
                  this.username = ''
                  this.email = ''
                  this.getUsers()
                })
                .catch(function(error) {
                  console.log(error);
                });
            }
            else
            {
              alert('kein usernamen eingegeben')
            }
          },
          setUserRights(){

            let checkboxes = document.getElementsByClassName('form-check-input')
            let rights = new Array()
            // console.log(checkboxes)
            let counter = 0
            for(let element in checkboxes)
            {
              let checkbox = checkboxes[element]

              if(checkbox.checked)
              {
                // let rights = new Array()
                let datastring = new Array(checkbox.dataset.userid + '-' + checkbox.dataset.task + '_' + checkbox.dataset.right)
                //
                // console.log(rightstring)

                rights[counter] = datastring;
                counter++
              }
            }

            var params = new URLSearchParams()
            params.append("arrayOfRights", rights)

            axios
              .post("/users/rights", params)
              .then(response => {
                console.log(response.data)
                this.rights = response.data
                this.getUsers()
              })
              .catch(function(error) {
                console.log(error);
              });
          },
          changeCurrentUser(user){
            this.current_user = user
            console.log(this.current_user)
          },
          checkUserRights(user, right){

            // console.log(user)
            if(!user.rights)
            {
              return false
            }
            else{
              if(user.rightsarray.includes(right))
              {
                return true
              }
              else{
                return false
              }

            }
          }
        },

    }
</script>
