use Klienti;

create table klienti(
	cid INTEGER ,
	cname VARCHAR(30),
    namee VARCHAR(30),
	adr VARCHAR(100),
	city VARCHAR(40),
    pcode integer,
    country VARCHAR(40),
  PRIMARY KEY (cid)
	);
    
 
    
INSERT INTO klienti(cid, cname, namee, adr, city, pcode, country) 
VALUES
(1,'Menaxhere','Argjeta Gashi','Rr. Bedri Mustafa','Prishtine', 10000, 'Kosove'),
(2,'Recepsion','Rigon Pacarizi','Rr. Rexho Bajraktari','Prizren', 20000, 'Kosove'),
(3,'Perkthyese','Gresa Ismajli','Rr. Hashim Thaqi','Skenderaj', 14000, 'Kosove'),
(4,'Programer', 'Ylli Prapashtica','Rr.Mileniumi 3','Prishtine', 10000, 'Kosove');

select * from klienti;