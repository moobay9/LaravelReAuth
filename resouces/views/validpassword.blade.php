<main class="">

    <div class="">
        <h2 class="">パスワードの確認</h2>

        <form action="{{ route('reauth.index') }}" method="post">
            @csrf

            @if ($errors->any())
            <div class="">
                <h3>恐れ入りますが、以下の内容を再度ご確認ください。</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- フォームテーブル -->
            <table class="">
                <tr>
                    <th>
                        <label for="input_pw">パスワード</label>
                    </th>
                    <td>
                        <!-- エラーの場合は.errorをつける -->
                        <input type="password" name="password" id="input_pw" class="@if ($errors->has('password')) error @endif">

                        @if ($errors->has('password'))
                        <!-- エラーメッセージ -->
                        <p class=""><span>{{$errors->first('password')}}</span></p>
                        @endif

                    </td>
                </tr>
            </table>

            <p class="">パスワードを入力してください。</p>

            <div class="">
                <div class=""><a href="{{ route('reauth.fallback') }}">キャンセル</a></div>
                <input class="" type="submit" value="送信">
            </div>

        </form>

    </div>

</main>