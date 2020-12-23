<form action="<?php $_PHP_SELF?>" method="post" enctype="multipart/form-data">
        <div class="form-group" style="width:40%; margin:auto">
            <h3>Book</h3>
            <label for="title">Title: </label></br>
            <input class="form-control" type="text" name="title" placeholder="Title"></br></br>
            <label for="price">Price: </label></br>
            <input class="form-control" type="number" name="price" placeholder="Price"></br></br>
            <label for="description"> Description: </label></br>
            <textarea class="form-control" name="description" placeholder="Description" cols="20" rows="10"></textarea></br></br>
            <label for="image"> Cover: </label></br>
            <input type="file" name="image">


            <h3>Author</h3>
            <input class="form-control" type="text" placeholder="Author's name" name="name"></br></br>
            <input class="form-control" type="text" placeholder="Author's surname" name="surname"></br></br>

            <h3>Genre</h3>
            <input class="form-control" type="text" name="genre" id="suggest" list="genre_data" placeholder="Genre">
            <datalist id="genre_data">

            </datalist></br></br>

            <input class="btn btn-primary mb-2" type="submit" name="add" value="Submit">
        </div>
</form>