//グループ化
SELECT ISBN, COUNT(*) FROM book_mark GROUP BY ISBN;

//グループ化、ソート
SELECT ISBN, COUNT(*) AS COUNT FROM book_mark GROUP BY ISBN ORDER BY COUNT DESC ;

SELECT ISBN, COUNT(*) AS COUNT FROM book_mark GROUP BY ISBN ORDER BY COUNT DESC LIMIT 5 ;



