@extends('layouts.app')

@section('content')
<style type="text/css">
    .result{
        padding: 10px;
        width: 100%;
        font-size: 22px;
        text-align: right;
    }
    form {
        text-align:center;
    }
    .number, .action, .return {
        margin-top: 10px;
        width: 23%;
        border: none;
        outline: none;
        font-size: 25px;
          opacity: 0.6;
    }

    input:hover{
        opacity: 1
    }

    .action {
        background: #03A9F4;
    }
    .return{
        background: #FF5722;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Calculator</div>
                <div class="card-body">
                    <div class="col-md-8 mx-auto">
                        <script>
                            var arr = [1,2,3,4,5,6,7,8,9,0,'+','-','/','.','*'];
                            function insert(num){
                                if (arr.includes(num)) {
                                    document.form.textView.value=document.form.textView.value+num;
                                }
                               
                            }
                            function equal(){
                                var exp = document.form.textView.value;
                                if(exp){
                                    document.form.textView.value=eval(document.form.textView.value);
                                }
                            }
                            function c(){
                                document.form.textView.value=" ";
                            }
                        </script>
                            <form name="form">
                                <input type="text" class="result" name="textView" readonly/><br>
                                <input type="button" class="number" value="1" onclick="insert(1)"/>
                                <input type="button" class="number" value="2" onclick="insert(2)"/>
                                <input type="button" class="number" value="3" onclick="insert(3)"/>
                                <input type="button" class="action" value="+" onclick="insert('+')"/>

                                <input type="button" class="number" value="4" onclick="insert(4)"/>
                                <input type="button" class="number" value="5" onclick="insert(5)"/>
                                <input type="button" class="number" value="6" onclick="insert(6)"/>
                                <input type="button" class="action" value="-" onclick="insert('-')"/>

                                <input type="button" class="number" value="6" onclick="insert(6)"/>
                                <input type="button" class="number" value="7" onclick="insert(7)"/>
                                <input type="button" class="number" value="8" onclick="insert(8)"/>
                                <input type="button" class="action" value="*" onclick="insert('*')"/>

                                <input type="button" class="number" value="." onclick="insert('.')"/>
                                <input type="button" class="number" value="0" onclick="insert(0)"/>
                                <input type="button" class="action" value="/" onclick="insert('/')"/>
                                <input type="button" class="action" value="=" onclick="equal()"/>
                                <input type="button" class="return" value="C" onclick="c()"/>
                                <br>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
