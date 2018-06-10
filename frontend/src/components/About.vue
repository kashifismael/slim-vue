<template>
    <div>
        <h1 class="text-center">About Page</h1>

        <div class="row1">

            <div> 
                <h3 class="text-center">Our Mission</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, qui. Repudiandae excepturi, eum, doloremque modi nobis ullam unde a incidunt eaque, fugiat vitae iusto optio quaerat expedita neque animi sapiente? </p>
            </div>

            <div> 
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero illo, molestiae quae exercitationem non mollitia! Incidunt soluta eaque commodi culpa. Tenetur iste vitae officiis reiciendis dolores fuga consequatur, modi eos.</p>
            </div>
        </div>

        <div class="sub_section">
            <div class="row2">
                <div>
                    <p> Liut consectetur deserunt eaque itaque omnis dolorem unde excepturi explicabo amet? Autem natus placeat corrupti voluptatibus?</p>
                </div>
                <div>
                    <p>ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div>
                    <p>bero illum eum, officiis beatae doloremque,</p>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {};
</script>

<style scoped>
.row1 {
    display: grid;
    grid-template-columns: 3fr 1fr;
    grid-gap: 1em;
    grid-auto-rows: minmax(100px, auto);
    margin-bottom: 1em;
}

.row1 > div {
    background: #eee;
    padding: 1em;
}

.row1 > div:nth-child(odd) {
    background: #ddd;
}

.sub_section {
    background: rgb(184, 235, 179);
    padding: 1em;
}

.row2 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 1em;
}

.row2 > div {
    background: rgb(76, 189, 61);
    padding: 1em;
}

.row2 > div:nth-child(odd) {
    background: rgb(61, 128, 61);
}

</style>
