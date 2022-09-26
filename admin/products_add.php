<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$price = $_POST['price'];
		$seller = $_POST['seller'];
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];
		$filename2 = $_FILES['photo2']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Product already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
					$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
				$new_filename2 = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo2']['tmp_name'], '../images/'.$new_filename2);
			}
               else{
				$new_filename = '';
				$new_filename2 = '';
			}

			
			try{
				$stmt = $conn->prepare("INSERT INTO products (category_id, name, description, slug, price, photo,photo2,seller) VALUES (:category, :name, :description, :slug, :price, :photo, :photo2, :seller)");
				$stmt->execute(['category'=>$category, 'name'=>$name, 'description'=>$description, 'slug'=>$slug, 'price'=>$price, 'photo'=>$new_filename, 'photo2'=>$new_filename2, 'seller'=>$seller]);
				$_SESSION['success'] = 'User added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: products.php');

?>