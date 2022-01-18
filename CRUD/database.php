<?php
class Database
{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbpass = NULL;
    private $dbName = "testing";

    private $con = false;
    private $mysqli = "";
    private $result = array();

    public function __construct()
    {
        if (!$this->con) {
            $this->mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbpass, $this->dbName);
            $this->con = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }
        } else {
            return true;
        }
    }
    public function insert($table, $params = array())
    {
        // Check to see if the table exists
        if ($this->tableExists($table)) {
            // Seperate $params's Array KEYs and VALUEs and Convert them to String Value
            $table_columns = implode(', ', array_keys($params));
            $table_value = implode("', '", $params);

            $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";
            // Make the query to insert to the database
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true; // The data has been inserted
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // The data has not been inserted
            }
        } else {
            return false; // Table does not exist
        }
    }

    public function update($table, $params = array(), $where = null)
    {
        // Check to see if table exists
        if ($this->tableExists($table)) {
            // Create Array to hold all the columns to update
            $args = array();
            foreach ($params as $key => $value) {
                $args[] = "$key = '$value'"; // Seperate each column out with it's corresponding value
            }

            $sql = "UPDATE $table SET " . implode(', ', $args);
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            // Make query to database
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true; // Update has been successful
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // Update has not been successful
            }
        } else {
            return false; // The table does not exist
        }
    }
    public function delete($table, $where = null)
    {
        // Check to see if table exists
        if ($this->tableExists($table)) {
            $sql = "DELETE FROM $table";  // Create query to delete rows
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            // Submit query to database
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true; // The query exectued correctly
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // The query did not execute correctly
            }
        } else {
            return false; // The table does not exist
        }
    }
    //function to select from the database
    public function select($table, $rows = "*", $join = null, $where = null, $order = null, $limit = null)
    {
        // Check to see if the table exists
        if ($this->tableExists($table)) {
            // Create query from the variables passed to the function
            $sql = "SELECT $rows FROM $table";
            if ($join != null) {
                $sql .= " JOIN $join";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            if ($order != null) {
                $sql .= " ORDER BY $order";
            }
            if ($limit != null) {
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start,$limit";
            }

            $query = $this->mysqli->query($sql);

            if ($query) {
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true; // Query was successful
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // No rows were returned
            }
        } else {
            return false; // Table does not exist
        }
    }

    private function tableExists($table)
    {
        $sql = "SHOW TABLES FROM $this->dbName LIKE '$table'";
        $tableInDb = $this->mysqli->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true; // The table exists
            } else {
                array_push($this->result, $table . " does not exist in this database.");
                return false; // The table does not exist
            }
        }
    }

    //return data to the user
    public function getResult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    public function sql($sql)
    {
        $query = $this->mysqli->query($sql);

        if ($query) {
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true; // Query was successful
        } else {
            array_push($this->result, $this->mysqli->error);
            return false; // No rows were returned
        }
    }

    public function pagination($table, $join = null, $where = null, $limit = null)
    {
        // Check to see if table exists
        if ($this->tableExists($table)) {
            if ($limit != null) {
                // select count() query for pagination
                $sql = "SELECT COUNT(*) FROM $table";
                if ($join != null) {
                    $sql .= " JOIN $join";
                }
                if ($where != null) {
                    $sql .= " WHERE $where";
                }

                $query = $this->mysqli->query($sql);

                $total_record = $query->fetch_array();
                $total_record = $total_record[0];

                $total_page = ceil($total_record / $limit);

                $url = basename($_SERVER['PHP_SELF']);
                // Get the Page Number which is set in URL
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                // show pagination
                $output = "<ul class='pagination'>";

                if ($page > 1) {
                    $output .= "<li><a href='$url?page=" . ($page - 1) . "'>Prev</a></li>";
                }

                if ($total_record > $limit) {
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $cls = "class='active'";
                        } else {
                            $cls = "";
                        }
                        $output .= "<li><a $cls href='$url?page=$i'>$i</a></li>";
                    }
                }
                if ($total_page > $page) {
                    $output .= "<li><a href='$url?page=" . ($page + 1) . "'>Next</a></li>";
                }
                $output .= "</ul>";

                echo $output;
            } else {
                return false; // If Limit is null
            }
        } else {
            return false; // Table does not exist
        }
    }

    public function __destruct()
    {
        if ($this->con) {
            if ($this->mysqli->close()) {
                $this->con = false;
                return true;
            }
        } else {
            return false;
        }
    }
}
