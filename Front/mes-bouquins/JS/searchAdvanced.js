function alimenter(list) {
    {	var sql = "SELECT * FROM dbo_zEfa_Users_View";
db.Open(sql,connect);
while( !db.EOF )
{	var MyVal = db(0);
    var MyName = db(1)
    var MyStr = db(5);
    nomOption = new Option([db(0)+ ' ' +db(1)],[MyStr.value]);
        list.options[list.options.length]=nomOption;
    db.MoveNext();	
    }
}

}