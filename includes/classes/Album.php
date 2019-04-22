<?php
class Album
{
    private $con;
    private $id;
    private $title;
    private $artistId;
    private $genre;
    private $artworkPath;

    public function __construct($con, $id)
    {
        $this->con = $con;
        $this->id = $id;

        $query = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($query);

        $this->title = $album['title'];
        $this->artistId = $album['artist_id'];
        $this->genre = $album['genre_id'];
        $this->artworkPath = $album['artworkPath'];
    }

    public function getAlbumTitle()
    {
        return $this->title;
    }

    public function getAlbumArtist()
    {
        return new Artist($this->con, $this->artistId);
    }

    public function getAlbumGenre()
    {
        return $this->genre;
    }

    public function getAlbumArtworkPath()
    {
        return $this->artworkPath;
    }
}
