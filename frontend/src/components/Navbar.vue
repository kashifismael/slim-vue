<template>
    <div>
        <nav>
            <ul>
                <li><router-link to="/">Home</router-link></li>
                
                <li><router-link to="/about">About Us</router-link></li>

                <li><router-link to="/contact">Contact</router-link></li>

                <li><router-link to="/add-book">Add Book</router-link></li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
  data() {
    return {};
  }
};
</script>

<style scoped>

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}

.router-link-exact-active {
  background-color: #4caf50;
}
</style>
