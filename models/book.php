<?php

/**
 *
 */
class Book extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'books';
	/**
	 *
	 */
	function __construct()
	{
		parent::__construct($this->table);
	}

	/**
	 * @param $id
	 * @return array
	 */
	function authors($id)
	{
		$sql = 'SELECT *, authors.id as author_id
                    FROM authors
                    JOIN author_book ON authors.id = author_id 
                    JOIN books ON book_id = books.id 
                    WHERE books.id = :book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $id]);
		return $pds->fetchAll();
	}

	/**
	 * @param $datas
	 */
	function update($datas)
	{
		$sql = 'UPDATE %s SET title = :title, summary = :summary, front_cover = :front_cover WHERE id = :book_id';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$inputs = [
			':book_id' => $datas['book_id'],
			':title' => $datas['title'],
			':summary' => $datas['summary'],
			':front_cover' => $datas['front_cover']
		];
		$pds->execute($inputs);
	}

	/**
	 * @param $authors
	 */
	function attachAuthors($book_id, $author_id)
	{
		$sql = 'INSERT INTO author_book (author_id, book_id) VALUES (:author_id,:book_id)';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':author_id' => $author_id, ':book_id' => $book_id]);
	}

	/**
	 * @param $authors
	 */
	function detachAuthors($book_id, $author_id)
	{
		$sql = 'DELETE FROM author_book WHERE author_id=:author_id AND book_id=:book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':author_id' => $author_id, ':book_id' => $book_id]);
	}

	function bookHasAuthor($author_id, $book_id)
	{
		$sql = 'SELECT * FROM author_book WHERE author_id = :author_id AND book_id = :book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':author_id' => $author_id, ':book_id' => $book_id]);
		return $pds->fetch();
	}

	function resetAuthors($book_id)
	{
		$sql = 'DELETE FROM author_book WHERE book_id=:book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $book_id]);
	}
	/**
	 *
	 */
	function create()
	{
	;
	}
}