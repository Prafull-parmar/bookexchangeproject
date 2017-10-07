<li> <form class="navbar-form navbar-left" method="POST" action="<?php $_PHP_SELF; ?>" >
    <div class="input-group">
    <select class="form-control" name="searchtype" required/>
    <option value="ALL">Search By</option>
     <option value="NAME">Book Name</option>
     <option value="AUTHOR">Book Author</option>
    <option value="SUBJECT">Subject</option>
    <option value="BRANCH">Branch</option>
    <option value="YEAR">Degree Year</option>
     </select>
    </div>
    <div class="input-group">
    <input type="text" name="Value" placeholder="Search " class="form-control">
    <div class="input-group-btn">
     <button class="btn btn-default" name="Search" type="submit">
     <i class="glyphicon glyphicon-search"></i>
     </button>
     </div>
     </div>
     </form></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
     <p class="navbar-text"> Welcome <?php echo $username; ?></p>
     <li><a href="Changepassword.php"><span class="glyphicon glyphicon-edit"></span> Change Password</a></li>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign-Out</a></li>
    
   