<?php
                        $this->item('forms','/create');
                        $this->item('box_', 'pname');
                        $this->item('hidden', 'user_id',$_SESSION['id']);
                        $this->item('box_', 'pprice','ProductPrice');
                        $this->item('box_', 'amount', 'number');
                        $this->item('file','primg');
                        $this->item('button_', 'Post');
                        $this->item('formd');
