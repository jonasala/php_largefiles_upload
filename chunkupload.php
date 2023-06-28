<?php

move_uploaded_file($_FILES['data']['tmp_name'], "chunks/" . $_POST['filename'] . '__' . $_POST['sequence']);
