<template>
    <div>
        <h1 class="text-center">Contact Page</h1>

        <form class="form">

            <div class="form-input">
                <label for="firstname">First name:</label>
                <input type="text" v-model="newMember.firstname">
            </div>

            <div class="form-input">
                <label for="firstname">Last name:</label>
                <input type="text" v-model="newMember.lastname">
            </div>

            <div class="form-input">
                <label for="firstname">Email:</label>
                <input type="email" v-model="newMember.email">
            </div>

            <div class="form-input text-center">
                <button v-on:click="addMember" type="submit">Submit</button>
            </div>

        </form>

        <h2 class="text-center">List of Members</h2>
        <p v-if="memberListIsEmpty()">No Members currently</p>
        <ul>
            <li v-for="member in members" :key="member.id">
                {{ member.firstname }} {{ member.lastname }} - {{member.email}}
            </li>
        </ul>

    </div>
</template>

<script>
export default {
  data() {
    return {
      members: [],
      newMember: {
        id: 0,
        firstname: "",
        lastname: "",
        email: ""
      }
    };
  },

  methods: {
    addMember(event) {
      event.preventDefault();
      this.members.push({
          id: this.members.length+1,
          firstname: this.newMember.firstname,
          lastname: this.newMember.lastname,
          email: this.newMember.email
      });
      this.newMember.firstname = "";
      this.newMember.lastname = "";
      this.newMember.email = "";
    },
    memberListIsEmpty(){
        return this.members.length == 0;
    }
  }
};
</script>

<style scoped>
.form-input {
  margin-bottom: 1em;
}

.form-input > input {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form-input > button {
  width: 50%;
  padding: 10px 10px;
  background-color: rgb(64, 201, 93);
  border-radius: 5px;
  border: none;
  color: white;
}

.form-input > button:hover {
  background-color: rgb(26, 109, 53);
}

.form {
  margin-left: 1em;
  margin-right: 1em;
}
</style>
