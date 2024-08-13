<?php

function getBlogs()
{

  $sql = "SELECT * FROM blog WHERE 1";
  return pdo_query($sql);
}
