<?php namespace models;

class PersonalPages
{
	private \PDO $db;
	private const TABLE_NAME = 'personal_pages';
	private array $requests;

	public function __construct() {
		$this->db = \Db::getInstance();
		$this->prepareRequests();
	}

	private function prepareRequests() : void {
		$this->requests = array(
			'add' => $this->db->prepare('INSERT INTO personal_pages
						(id, label, editor_email) 
						VALUES :id, :label, :editor_email'),
			'get_by_editor_email' => $this->db->prepare('SELECT * 
										FROM personal_pages
										WHERE editor_email=?'),
			'get_by_id' =>	$this->db->prepare('SELECT * 
								FROM personal_pages
								WHERE id=?'),
			'count_by_id' => $this->db->prepare('SELECT COUNT(*)
								 FROM personal_pages
								 WHERE id=?'),
		);
	}

	public function getAll() : array {
		$result = $this->db->query('SELECT id, label, editor_email
									FROM personal_pages');
		if($result) {
			return $result->fetchAll(\PDO::FETCH_CLASS, '\models\PersonalPage');
		}
		return array();
	}

	public function addPage(string $label, string $icon, string $editor_email) : bool {
		$next_id = $this->getMaxId() + 1;

		$dir = "views/content/personal_pages/{$next_id}";
		mkdir($dir);
		fclose(fopen($dir . "/links.html", "w")); // create file
		fclose(fopen($dir . "/news.html", "w"));
		fclose(fopen($dir . "/story.html", "w"));

		$result = $requests['add']->execute(array(
			'id' => $next_id,
			'label' => $label, 
			'editor_email' => $editor_email,
		));
		return $result;
	}

	private function getMaxId() : int
	{
		$result = $this->db->query('SELECT MAX(id) FROM personal_pages');
		if ($result) {
			return $result->fetch(\PDO::FETCH_NUM)[0];
		}
		return 0;
	}

	// private function saveIcon(string $dir, $image)
	// {
	// 	$url = "images/image_load_error.png";
	// 	if($image['error'] == UPLOAD_ERR_OK) {
	// 		$extension = pathinfo($image['name'])['extension'];
	// 		$url = "{$dir}/icon.{$extension}";
	// 		if(!move_uploaded_file($image['tmp_name'], $url)) {
	// 			unlink($url);
	// 			move_uploaded_file($image['tmp_name'], $url);
	// 		}
	// 	}
	// 	return $url;
	// }

	public function getPagesByEditorEmail(string $email) : array
	{
		if($email != ADMIN_EMAIL) {
			$request = $this->requests['get_by_editor_email'];
			$result = $request->execute(array($email));
			if($result) {
				return ($request)->fetchAll(\PDO::FETCH_CLASS, '\models\PersonalPage');
			}
		} else {
			return $this->getAll();
		}
		return array();
	}
	
	public function isValidPageId($id) {
		$request = $this->requests['count_by_id'];
		$result = $request->execute(array($id));
		if($result) {
			$pages_count = $request->fetch(\PDO::FETCH_NUM)[0];
			return ($pages_count == '1');
		}

	}

}