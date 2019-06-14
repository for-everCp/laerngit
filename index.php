<?php
if ((($_userheadS["userhead"]["type"] == "image/gif")
|| ($_userheadS["userhead"]["type"] == "image/jpeg")
|| ($_userheadS["userhead"]["type"] == "image/pjpeg"))
&& ($_userheadS["userhead"]["size"] < 20000))
  {
  if ($_userheadS["userhead"]["error"] > 0)
    {
    echo "Return Code: " . $_userheadS["userhead"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_userheadS["userhead"]["name"] . "<br />";
    echo "Type: " . $_userheadS["userhead"]["type"] . "<br />";
    echo "Size: " . ($_userheadS["userhead"]["size"] / 1024) . " Kb<br />";
    echo "Temp userhead: " . $_userheadS["userhead"]["tmp_name"] . "<br />";

    if (userhead_exists("upload/" . $_userheadS["userhead"]["name"]))
      {
      echo $_userheadS["userhead"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_userhead($_userheadS["userhead"]["tmp_name"],
      "upload/" . $_userheadS["userhead"]["name"]);
      echo "Stored in: " . "upload/" . $_userheadS["userhead"]["name"];
      }
    }
  }
else
  {
  echo "Invalid userhead";
  }
?>