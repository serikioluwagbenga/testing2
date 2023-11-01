<?php 
    class todo extends database {
        function add_cat() {
        // get name of cat, userID
            $name = htmlspecialchars($_POST['name_cat']);
            $userID = $this->get_user();
            if (empty($name) || empty($userID)) {
                $this->message("Enter category name");
            }
            // check if cat name exists
            $check = $this->db->prepare("Select * from categories where name = ? and userID = ?");
            $check->execute([$name, $userID]);
            if($check->rowCount() > 0) {
                $this->message("This category alread exists");
                return;
            }
            // insert into database
            $ID = uniqid();
            $insert = $this->db->prepare("INSERT INTO categories (ID, userID, name) VALUES (?,?,?)");
            $insert->execute([$ID, $userID, $name]);
        }

        function add_todo($catID) {
            if(!isset($_POST["todo_name_$catID"])) {
                return  false;
            }
            $name = htmlspecialchars($_POST["todo_name_$catID"]);
            $insert = $this->db->prepare("INSERT INTO todo_list (catID, title) VALUES (?,?)");
            if($insert->execute([$catID, $name])) {
                $this->message("Todo added successfully", "success");
            } 
        }

        function edit_cat() { 
            // get cat ID, userID
            // get name of cat
            // check if new name do not exists
            // update cat data
        }

        function del_cat() { 
            // get cat ID, UserID
            // validate if catID belong to the userID
            // delete the cat where catID = catID
        }

        function get_cat_list() {
            $userID = $this->get_user();
            $data = $this->db->prepare("Select * from categories where userID = ? and status = ?");
            $data->execute([$userID, "active"]);
            return $data;
        }


        function display_list($cat) {
            echo '
            <div class="col-md-6 col-12">
        <div class="card px-3">
            <div class="card-body">
                <h4 class="card-title">'.$cat['name'].'</h4>
                <div class="add-items d-flex"> 
                    <form action="index.php?catID='.$cat['ID'].'" method="POST">
                        <input type="text" name="todo_name_'.$cat['ID'].'" class="form-control todo-list-input" placeholder="What do you need to do today?"> <input type="submit" name="add_todo" class="add btn btn-primary font-weight-bold todo-list-add-btn" value="ADD"> 
                    </form>
                </div>
                <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list">
                        <li>
                            <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox"> For what reason would it be advisable. <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox" checked=""> For what reason would it be advisable for me to think. <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                            <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox"> it be advisable for me to think about business content? <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                            <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox"> Print Statements all <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox" checked=""> Call Rampbo <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                            <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox"> Print bills <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>';
        }

    }
