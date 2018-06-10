<template>
    <div>

      <h1 class="text-center">Book Shop</h1>

      <h2 v-if="bookDeleted" class="text-center delete">Book Deleted</h2>

      <div class="form-input">
        <label for="search">Search for book:</label>
        <input type="text" v-model="searchTerm" v-on:keyup="filterBooks">
      </div>

      <table>
        <thead>
          <tr>
            <th>Book name</th>
            <th>Author</th>
            <th>Year published</th>
            <th>View</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in booksToShow" :key="book.id">
            <td>{{book.name}}</td>
            <td>{{book.author}}</td>
            <td>{{book.year_published}}</td>
            <td><router-link v-bind:to="'/view-book/'+book.id">View</router-link></td>
            <td><button v-on:click="deleteBook(book)">Delete</button></td>
          </tr>
        </tbody>
      </table>

    </div>
</template>

<script>
import bookService from "../services/BookService.js";

export default {
  components: {},

  data() {
    return {
      allBooks: [],
      booksToShow: [],
      bookDeleted: false,
      searchTerm: ""
    };
  },
  mounted() {
    bookService.getAllBooks().then(data => {
      this.allBooks = data;
      this.booksToShow = this.allBooks;
    });
    //.then(this.booksToShow = this.allBooks);
  },
  methods: {
    deleteBook(book) {
      bookService
        .deleteBook(book.id)
        .then(deletedBook => this.removeBookFromTable(deletedBook))
        .then((this.bookDeleted = true));
    },
    removeBookFromTable(book) {
      for (let i = 0; i < this.allBooks.length; i++) {
        if (this.allBooks[i].id == book.id) {
          this.allBooks.splice(i, 1);
        }
      }
    },
    filterBooks() {
      this.booksToShow = this.allBooks.filter(book => {
        return book.name.toLowerCase().includes(this.searchTerm.toLowerCase());
      });
      if(this.searchTerm == "")
        this.booksToShow = this.allBooks;
    }
  }
};
</script>

<style scoped>
.delete {
  color: rgb(21, 133, 21);
}

a:link,
a:visited {
  background-color: rgb(54, 120, 218);
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 5px;
}

a:hover {
  background-color: rgb(54, 54, 204);
}

button {
  background-color: rgb(199, 33, 33);
  color: white;
  padding: 12px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border: none;
  border-radius: 5px;
}

button:hover {
  background-color: rgb(165, 21, 21);
}

table {
  margin: auto;
  width: 100%;
}

th,
td {
  padding: 15px;
  text-align: left;
}

tr > th {
  border-bottom: 1px solid #000;
}

tbody > tr > td {
  border-bottom: 1px solid #ddd;
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
</style>
