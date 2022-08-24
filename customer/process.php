<?php
require '../connection.php';

if(isset($_GET["page"]))
{

	$data = array();

	$limit = 8;

	$page = 1;

	if($_GET["page"] > 1)
	{
		$start = (($_GET["page"] - 1) * $limit);

		$page = $_GET["page"];
	}
	else
	{
		$start = 0;
	}

	$where = '';
    
	$search_query = '';


    

	if(isset($_GET["price_filter"]))
	{
		if($where != '')
		{
			$where .= ' AND '. trim($_GET["price_filter"]);
            
		}
		else
		{
            
			$where .= trim($_GET["price_filter"]);
		}

		$search_query .= '&price_filter='.trim($_GET["price_filter"]);
	}

	if(isset($_GET["product_filter"]))
	{
		$product_array = explode(",", trim($_GET["product_filter"]));

		if(count($product_array) > 0)
		{
			if(count($product_array) > 1)
			{
				if($where != '')
				{
					$product_condition = '';
					foreach($product_array as $product_type)
					{
						if(trim($product_type) != '')
						{
							$product_condition .= 'product_type = "'.trim($product_type).'" OR ';
						}
					}
					if($product_condition != '')
					{
						$where .= ' AND ('.substr($product_condition, 0, -4).')';
					}
				}
				else
				{
					$product_condition = '';
					foreach($product_array as $product_type)
					{
						if(trim($product_type) != '')
						{
							$product_condition .= 'product_type = "'.trim($product_type).'" OR ';
						}
					}
					if($product_condition != '')
					{
						$where .= substr($product_condition, 0, -4);
					}
				}
			}
			$search_query .= '&product_filter=' . trim($_GET["product_filter"]);
		}
	}

	/*======================================================================
	if(isset($_GET["star_product_filter"]))
	{
		$star_product_array = explode(",", trim($_GET["star_product_filter"]));

		if(count($star_product_array) > 0)
		{
			if(count($star_product_array) > 1)
			{
				if($where != '')
				{
					$star_product_condition = '';
					foreach($star_product_array as $star_product_type)
					{
						if(trim($star_product_type) != '')
						{
							$star_product_condition .= 'rating = "'.trim($star_product_type).'" OR ';
						}
					}
					if($star_product_condition != '')
					{
						$where .= ' AND ('.substr($star_product_condition, 0, -4).')';
					}
				}
				else
				{
					$star_product_condition = '';
					foreach($star_product_array as $star_product_type)
					{
						if(trim($star_product_type) != '')
						{
							$star_product_condition .= 'rating = "'.trim($star_product_type).'" OR ';
						}
					}
					if($product_condition != '')
					{
						$where .= substr($product_condition, 0, -4);
					}
				}
			}
			$search_query .= '&star_filter=' . trim($_GET["star_filter"]);
		}
	}
//===============================================================================================*/

	if($where != '')
	{
		$where = 'WHERE ' . $where;
	}


	$query = "
	SELECT description, merchant_id, image, product_name, price, product_type, product_id
	FROM product 
	".$where."
	ORDER BY product_id ASC
	";

		
	$filter_query = $query . ' LIMIT ' . $start . ', ' . $limit . '';

	$statement = $connect->prepare($query);

	$statement->execute();

	$total_data = $statement->rowCount();

	$statement = $connect->prepare($filter_query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach($result as $row)
	{
		$img_arr = explode(" ~ ", $row['image']);

		$data[] = array(
			'product_id'				=>	$row["product_id"],
			'product_name'				=>	$row["product_name"],
			'product_type'				=>	$row['product_type'],
			'merchant_id'				=>	$row['merchant_id'],
            'price'				=>	$row['price'],
			'image'				=>	$img_arr[0],
            'description'				=>	$row['description'],
		);

	}

	$pagination_html = '
	<nav aria-label="Page navigation example">
  		<ul class="pagination justify-content-center">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = [];

	if($total_links > 0)
	{
		if($total_links > 4)
		{
			if($page < 5)
			{
				for($count = 1; $count <= 5; $count++)
				{
					$page_array[] = $count;
				}
				$page_array[] = '...';
				$page_array[] = $total_links;
			}
			else
			{
				$end_limit = $total_links - 5;

				if($page > $end_limit)
				{
					$page_array[] = 1;

					$page_array[] = '...';

					for($count = $end_limit; $count <= $total_links; $count++)
					{
						$page_array[] = $count;
					}
				}
				else
				{
					$page_array[] = 1;

					$page_array[] = '...';

					for($count = $page - 1; $count <= $page + 1; $count++)
					{
						$page_array[] = $count;
					}

					$page_array[] = '...';

					$page_array[] = $total_links;
				}
			}
		}
		else
		{
			for($count = 1; $count <= $total_links; $count++)
			{
				$page_array[] = $count;
			}
		}

		for($count = 0; $count < count($page_array); $count++)
		{
			if($page == $page_array[$count])
			{
				$page_link .= '
				<li class="page-item active">
		      		<a class="page-link" href="#">'.$page_array[$count].'</a>
		    	</li>
				';

				$previous_id = $page_array[$count] - 1;

				if($previous_id > 0)
				{
					$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_product('.$previous_id.',`'.$search_query.'`)">Previous</a></li>';
				}
				else
				{
					$previous_link = '
					<li class="page-item disabled">
				        <a class="page-link" href="#">Previous</a>
				    </li>
					';
				}

				$next_id = $page_array[$count] + 1;

				if($next_id >= $total_links)
				{
					$next_link = '
					<li class="page-item disabled">
		        		<a class="page-link" href="#">Next</a>
		      		</li>
					';
				}
				else
				{
					$next_link = '
					<li class="page-item"><a class="page-link" href="javascript:load_product('.$next_id.',`'.$search_query.'`)">Next</a></li>
					';
				}

			}
			else
			{
				if($page_array[$count] == '...')
				{
					$page_link .= '
					<li class="page-item disabled">
		          		<a class="page-link" href="#">...</a>
		      		</li>
					';
				}
				else
				{
					$page_link .= '
					<li class="page-item">
						<a class="page-link" href="javascript:load_product('.$page_array[$count].', `'.$search_query.'`)">'.$page_array[$count].'</a>
					</li>
					';
				}
			}
		}

	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</nav>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data,
        'where' => $where
	);

	echo json_encode($output);

}


if(isset($_GET["action"]))
{
	$data = array();



	$query = "
	SELECT product_type, COUNT(product_id) AS Total FROM product GROUP BY product_type
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['product_type'];
		$sub_data['total'] = $row['Total'];
		$data['product_type'][] = $sub_data;
	}

	$price_range = array(
		'price < 10'						=>	'Under &#8369;10',
		'price >= 10 AND price < 20'		=>	'&#8369;10 - &#8369;20', 
		'price >= 20 AND price < 30'	=>	'&#8369;20 - &#8369;30',
		'price >= 30'						=>	'Over &#8369;30'
	);

	foreach($price_range as $key => $value)
	{
		$query = "
		SELECT COUNT(product_id) AS Total FROM product 
		WHERE ".$key." 
		";
		$sub_data = array();
		foreach($connect->query($query) as $sub_row)
		{
			$sub_data['name'] = $value;
			$sub_data['total'] = $sub_row['Total'];
			$sub_data['condition'] = $key;		
		}
		$data['price'][] = $sub_data;
	}

	echo json_encode($data);
}



?>