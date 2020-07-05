<?php namespace models;

class News
{
	private \PDO $db;
	private array $news;
	private array $requests;

	public function __construct() {
		$this->db = \Db::getInstance();
		$this->prepareRequests();
	}

	public function prepareRequests() {
		$this->requests = array(
			'add' => $this->db->prepare('INSERT INTO news
							(title, body) 
							VALUES (:title, :body)'),
			'get_last' => $this->db->prepare('SELECT title, body
								FROM `news` 
								ORDER BY `id` DESC 
								LIMIT :rows_count')
		);
	}
	
	public function addItem(NewsItem $item) : bool {
		$result = ($this->requests['add'])->execute(array(
			'title' => $item->title,
			'body' => $item->body,
		));
		return $result;
	}

	// private function saveIfExist($image) : ?string{
	// 	$url = null;
	// 	if($image['error'] == UPLOAD_ERR_OK) {
	// 		$url = "images/for_news/{$image['name']}";
	// 		if(!move_uploaded_file($image['tmp_name'], $url)) {
	// 			unlink($url);
	// 			move_uploaded_file($image['tmp_name'], $url);
	// 		}
	// 	}
	// 	return $url;
	// }

	public function getLast(int $count) : array {
		$request = $this->requests['get_last'];
		$request->bindValue('rows_count', $count, \PDO::PARAM_INT);
		$result = $request->execute();
		$news = $request->fetchAll(\PDO::FETCH_CLASS, '\models\NewsItem');
		return $news;
	}
}