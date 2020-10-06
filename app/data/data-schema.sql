CREATE TABLE employee(
  empID int(11) AUTO_INCREMENT NOT NULL,
  firstname varchar(25) NOT NULL,
  lastName varchar(25) NOT NULL,
  gender varchar(11),
  addressStreet varchar(50) NOT NULL,
  addressCity varchar(50) NOT NULL,
  addressState varchar(2) NOT NULL,
  adressZip varchar(10),
  radioNum varchar(10) NOT NULL,
  PRIMARY KEY(empID)
);

INSERT INTO employee VALUES(
  1, "Kathryn", "Pryde", "Female", "1123 Xavier School Drive", "Watkinsville", "GA", "30677", "A-1"
);

INSERT INTO employee VALUES(
  2, "Piotr", "Rasputin", "Male", "A31 Mother Russia Road", "Seattle", "WA", "98133", "841"
);

INSERT INTO employee VALUES(
  3, "Warren", "Worthington III", "Male", "1140 Experiment Station Rd", "Watkinsville", "GA", "", "A-1"
);

CREATE TABLE empPhone(
  empID int(11) NOT NULL,
  phoneNum varchar(25) NOT NULL,
  type varchar(10) NOT NULL,
  FOREIGN KEY (empID) REFERENCES employee(empID)
);

INSERT INTO empPhone VALUES(
  1, "707-555-1234", "Work"
);

INSERT INTO empPhone VALUES(
  1, "707-555-2345", "Mobile"
);

INSERT INTO empPhone VALUES(
  2, "206-555-9876", "Mobile"
);

INSERT INTO empPhone VALUES(
  3, "706-555-3945", "Work"
);

CREATE TABLE empEmail(
  empID int(11) NOT NULL,
  email varchar(50) NOT NULL,
  type varchar(10) NOT NULL,
  FOREIGN KEY (empID) REFERENCES employee(empID)
);

INSERT INTO empEmail VALUES(
  1, "kpryde@gmail.com", "Personal"
);

INSERT INTO empEmail VALUES(
  1, "kathryn.pryde@OCFR.org", "Work"
);

INSERT INTO empEmail VALUES(
  2, "piotr.rasputin@OCFR.org", "Work"
);

INSERT INTO empEmail VALUES(
  2, "putinsBFF@hotmail.com", "Personal"
);

INSERT INTO empEmail VALUES(
  3, "warren.worthington@OCFR.com", "Work"
);

INSERT INTO empEmail VALUES(
  3, "WW3@gmail.com", "Personal"
);

CREATE TABLE certification(
  certID int(11) AUTO_INCREMENT NOT NULL,
  nameShort varchar(50) NOT NULL,
  stdExipry varchar(15),
  PRIMARY KEY(certID)
);

INSERT INTO certification VALUES(
  1, "CPR", "2 years"
);

INSERT INTO certification VALUES(
  2, "Firefighter I", "3 years"
);

INSERT INTO certification VALUES(
  3, "Firefighter II", "2 years"
);

INSERT INTO certification VALUES(
  4, "POST", "5 years"
);

INSERT INTO certification VALUES(
  5, "EMT-Basic", "3 years"
);

INSERT INTO certification VALUES(
  6, "EMT-Adv", "5 years"
);

INSERT INTO certification VALUES(
  7, "Due Regard", "2 years"
);

INSERT INTO certification VALUES(
  8, "Paramedic", "3 years"
);

INSERT INTO certification VALUES(
  9, "HAZMAT", "3 years"
);

INSERT INTO certification VALUES(
  9, "Extrication", "N/A"
);

CREATE TABLE certEmpDetails(
  empID int(11) NOT NULL,
  certID int(11) NOT NULL,
  dateObtained date,
  dateRenewed date,
  dateExp date,
  FOREIGN KEY (empID) REFERENCES employee(empID),
  FOREIGN KEY (certID) REFERENCES certification(certID)
);

INSERT INTO certEmpDetails VALUES(
  1, 3, "2016-08-01", "2018-08-01", "2020-08-01"
);

INSERT INTO certEmpDetails VALUES(
  1, 1, "2015-07-01", "2017-07-01", "2019-07-01"
);

INSERT INTO certEmpDetails VALUES(
  1, 9, "2017-02-01", "", "2020-02-01"
);

INSERT INTO certEmpDetails VALUES(
  1, 3, "2018-05-01", "", ""
);

INSERT INTO certEmpDetails VALUES(
  2, 6, "2015-09-01", "", "2020-09-01"
);

INSERT INTO certEmpDetails VALUES(
  2, 1, "2017-07-01", "2019-07-01", "2021-07-01"
);

INSERT INTO certEmpDetails VALUES(
  2, 7, "2017-10-01", "2019-10-01", "2021-10-01"
);

INSERT INTO certEmpDetails VALUES(
  3, 8, "2016-09-01", "", "2019-09-01"
);

INSERT INTO certEmpDetails VALUES(
  3, 1, "2018-07-01", "", "2020-07-01"
);

INSERT INTO certEmpDetails VALUES(
  3, 7, "2017-10-01", "", "2019-10-01"
);

INSERT INTO certEmpDetails VALUES(
  3, 2, "2017-08-01", "", "2020-08-01"
);

CREATE TABLE station(
  stationNum varchar(5) AUTO_INCREMENT NOT NULL,
  PRIMARY KEY(stationNum)
);

INSERT INTO station VALUES(
  "1"
);
INSERT INTO station VALUES(
  "2"
);
INSERT INTO station VALUES(
  "3"
);
INSERT INTO station VALUES(
  "4"
);
INSERT INTO station VALUES(
  "5"
);
INSERT INTO station VALUES(
  "6"
);
INSERT INTO station VALUES(
  "7"
);
INSERT INTO station VALUES(
  "8"
);

CREATE TABLE employeeStation(
  empID int(11) NOT NULL,
  stationNum int(11) NOT NULL,
  FOREIGN KEY (empID) REFERENCES employee(empID),
  FOREIGN KEY (stationNum) REFERENCES station(stationNum)
);

INSERT INTO employeeStation VALUES(
  1, 1
);
INSERT INTO employeeStation VALUES(
  1, 2
);
INSERT INTO employeeStation VALUES(
  1, 3
);
INSERT INTO employeeStation VALUES(
  1, 4
);
INSERT INTO employeeStation VALUES(
  1, 5
);
INSERT INTO employeeStation VALUES(
  1, 6
);
INSERT INTO employeeStation VALUES(
  1, 7
);
INSERT INTO employeeStation VALUES(
  1, 8
);
INSERT INTO employeeStation VALUES(
  2, 8
);
INSERT INTO employeeStation VALUES(
  3, 1
);
