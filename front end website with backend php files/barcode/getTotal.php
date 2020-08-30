<?php

                                                        // Create connection
                                                        $conn = new mysqli("localhost","root","","barcode");
                                                        // Check connection
                                                        if ($conn->connect_error) {
                                                          die("Connection failed: " . $conn->connect_error);
                                                        }

                                                        $sql = "SELECT mrp FROM cart";
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            $summation=0;
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                              $summation=$summation+$row['mrp'];
                                                            }
                                                            echo "Rs ".$summation;

                                                          } else {
                                                            echo "Rs 0";
                                                          }

                                                          $conn->close();
                                                          ?>
