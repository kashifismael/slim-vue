<template>
    <div>
        <h1 class="text-center">Add book</h1>

        <h2 v-if="bookAdded" class="text-center success">Book added successfully</h2>

        <form class="form">

            <div class="form-input">
                <label for="name">Book name:</label>
                <input type="text" v-model="newBook.name">
            </div>

            <div class="form-input">
                <label for="author">Author name:</label>
                <input type="text" v-model="newBook.author">
            </div>

            <div class="form-input">
                <label for="year">Year Published:</label>
                <input type="number" v-model="newBook.year_published">
            </div>

            <div class="form-input text-center">
                <button v-on:click="addBook" type="submit">Submit</button>
            </div>

        </form>

    </div>
</template>

<script>
import bookService from "../services/BookService.js";

export default {
  data() {
    return {
      newBook: {
        name: "",
        author: "",
        year_published: 1900
      },
      bookAdded: false
    };
  },

  methods: {
    addBook(event) {
      event.preventDefault();
      bookService.createBook(this.newBook).then(data => {
        let addedBook = data;
        if (addedBook.id) {
          this.bookAdded = true;
        }
        console.log(addedBook);
      });
    }
  }
};
</script>

<style scoped>
.success {
  color: rgb(20, 138, 16);
}

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
