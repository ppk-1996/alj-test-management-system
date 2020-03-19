<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::truncate();

        Question::create([
            'question_text' => '<p>ကိန်းဂဏန်းတစ်ခု(သုညထက်ကြီးသောအပေါင်းကိန်း)ကို Input လက်ခံပါ။ လက်ခံသောကိန်းသည် ဂဏန်းနှစ်လုံးဖြစ်ခဲ့လျှင် ဘယ်ဖက်၌ 0(သုည) တစ်လုံးပေါင်းထည့်ပြီးကိန်းဂဏန်းသုံးလုံးဖြစ်အောင်ဖန်တီးပါ။</p> <p>ဥပမာ (၁)<br /> Input တန်ဖိုး n သည် 98 ဖြစ်ခဲ့လျှင် Output မှာ 098 ဖြစ်သည်။</p> <p>ဥပမာ (၂)<br /> Input တန်ဖိုး n သည် 2 ဖြစ်ခဲ့လျှင် Output မှာ 002 ဖြစ်သည်။</p>',
            'q_no' => '1'
        ]);
        Question::create([
            'question_text' => '<p>ကိန်းဂဏန်းငါးလုံးကို တစ်လိုင်းခြင်းစီ Input လက်ခံပါ။ အကြီးဆုံးကိန်းနှင့် အငယ်ဆုံးကိန်းကိုတစ်လိုင်းခြင်းစီ Output ပြန်ထုတ်ပါ။</p> <p>ဥပမာ<br /> Input တန်ဖိုးသည်<br /> 9<br /> 12<br /> 3<br /> 6<br /> 10<br /> ဖြစ်ခဲ့လျှင် Output မှာ<br /> Output<br /> 12<br /> 3<br /> ဖြစ်သည်။</p>',
            'q_no' => '2'
        ]);
        Question::create([
            'question_text' => '<p>Letters ၁၀ လုံး ပါဝင်သော Input တစ်ခုကိုလက်ခံပြီး၊ ထို Letters အတွင်း W သည် ၅လုံးနှင့် အထက်ပါဝင်လျှင် OK ဟု Output ထုတ်ပေးပြီး ၅လုံးအောက်သာပါဝင်လျှင် NG ဟု Output ထုတ်ပေးပါ။<br /> (မှတ်ချက်။ Letters ၁၀ လုံးသည် တစ်လုံးနှင့်တစ်လုံးကြားတွင် space ပါဝင်သည်။ ထိုLetters ၁၀ လုံးအတွင်းပါဝင်သော Letter သည် S (သို့မဟုတ်) Wသာဖြစ်သည်။)</p> <p>ဥပမာ (၁)<br /> Input တန်ဖိုးသည် W W W W W S W W S W ဖြစ်ခဲ့လျှင် Wသည် ၅လုံးနှင့်အထက် ပါဝင်သောကြောင့် Output မှာOK ဖြစ်သည်။</p> <p>ဥပမာ (၂)<br /> Input တန်ဖိုးသည် W W S S S W S W S S ဖြစ်ခဲ့လျှင် Wသည် ၅လုံးအောက်သာ ပါဝင်သောကြောင့် Output မှာNG ဖြစ်သည်။</p>',
            'q_no' => '3'
        ]);
        Question::create([
            'question_text' => '<p>Grayscale Images သည် 255(အဖြူ ) မှ 0(အမဲ) Gradations ဖြင့်ဖေါ်ပြသော Image ဖြစ်သည်။<br /> 0 နှင့် နီးသောGradations သည် အမဲရောင်တမ်းပြီး၊ 255 နှင့် နီးသော Gradations သည် အဖြူရောင်တမ်းသည်။<br /> Grayscale Images ရဲ ့gradations သည် 128 နှင့်အထက်ဖြစ်ပါကအဖြူဟုသတ်မှတ်ပြီး၊ Gradations သည် 127 နှင့်အောက်ဖြစ်ပါကအမဲဟုသတ်မှတ်သည်။ ထို Grayscale Images ရဲ့Gradations ကိုအသုံးပြု ပြီးအဖြူ (သို ့မဟုတ်)အမဲကိုဆုံးဖြတ်ပေးသော Program ကိုရေးပါ။အဖြူဖြစ်ခဲ့လျှင် 1 ဟု output ထုတ်ပေးပြီး၊ အမဲဖြစ်ခဲ့လျှင် 0ဟု output ထုတ်ပေးရမည်။</p> <p><img alt="grayscale example" src="https://www.aljmyanmar.com/programming_test/img/q4_01.png" style="height:291px; width:383px" /></p> <p>Input တန်ဖိုး၏ Format မှာအောက်ပါအတိုင်းဖြစ်သည်။<br /> H W<br /> P_{1, 1} P_{1, 2} ... P_{1, W}<br /> P_{2, 1} P_{2, 2} ... P_{2, W}<br /> ...<br /> P_{H, 1} P_{H, 2} ... P_{H, W}</p> <p>Input Data ၏ Line အရေအတွက်သည် H + 1 ဖြစ်သည်။<br /> Input Data ၏ Length သည် W ဖြစ်သည်။<br /> H Wတစ်လုံးနှင့်တစ်လုံးကြားတွင် space ပါဝင်သည်။<br /> P_{1, 1} P_{1, 2} ... P_{1, W}တစ်လုံးနှင့်တစ်လုံးကြားတွင်လည်း space ပါဝင်သည်။</p> <p>Output တန်ဖိုး၏ Format မှာအောက်ပါအတိုင်းဖြစ်သည်။<br /> B_{1, 1} B_{1, 2} ... B_{1, W}<br /> B_{2, 1} B_{2, 2} ... B_{2, W}<br /> ...<br /> B_{H, 1} B_{H, 2} ... B_{H, W}</p> <p>B_{1, 1} B_{1, 2} ... B_{1, W}တစ်လုံးနှင့်တစ်လုံးကြားတွင် space ပါဝင်သည်။</p> <p>ဥပမာ(၁)<br /> Input တန်ဖိုးသည်<br /> 3 2<br /> 128 127<br /> 127 128<br /> 128 127<br /> ဖြစ်ခဲ့လျှင် Output မှာ<br /> 1 0<br /> 0 1<br /> 1 0<br /> ဖြစ်သည်။</p> <p>ဥပမာ(၂)<br /> Input တန်ဖိုးသည်<br /> 1 1<br /> 0<br /> ဖြစ်ခဲ့လျှင် Output မှာ<br /> 0<br /> ဖြစ်သည်။</p>',
            'q_no' => '4'
        ]);
        Question::create([
            'question_text' => '<p>Tag နှစ်ခုကြားအတွင်းရှိသော Data ကိုOutputထုတ်ပေးသော Program ကိုရေးပါ။<br /> Input တန်ဖိုးသည်<br /> &lt;abc&gt; &lt;xyz&gt;<br /> hoge&lt;abc&gt;piyo&lt;xyz&gt;<br /> ဖြစ်ခဲ့လျှင် Output မှာ<br /> piyo<br /> ဖြစ်သည်။</p> <p>ပထမ Input သည် Tag နှစ်ခုအတွက်ဖြစ်ပြီး၊<br /> ဒုတိယ Inputသည် ပထမ Input ၏ Tag နှစ်ခုကြားထဲမှ Data ကိုဆွဲထုတ်ပေးရန်အတွက်ပေးသော Input ဖြစ်သည်။</p> <p>မှတ်ချက်။ ပထမ Input ၏ Tag တစ်ခုနှင့်တစ်ခုကြားတွင် space ပါဝင်သည်။<br /> Tag နှစ်ခုကြားထဲမှ Data ၏ length သည် သုညဖြစ်သောအခါ &lt;blank&gt;ကို output ထုတ်ပေးရမည်။</p> <p>ဥပမာ(၁)<br /> Input တန်ဖိုးသည်<br /> &lt;abc&gt; &lt;xyz&gt;<br /> &lt;abc&gt;123&lt;abc&gt;456&lt;xyz&gt;789&lt;xyz&gt;<br /> ဖြစ်ခဲ့လျှင် Output မှာ<br /> 123&lt;abc&gt;456<br /> ဖြစ်သည်။</p> <p>ဥပမာ(၂)<br /> Input တန်ဖိုးသည်<br /> &lt;a&gt; &lt;b&gt;<br /> &lt;a&gt;&lt;a&gt;&lt;b&gt;<br /> ဖြစ်ခဲ့လျှင် Output မှာ<br /> &lt;a&gt;<br /> ဖြစ်သည်။</p> <p>ဥပမာ(၃)<br /> Input တန်ဖိုးသည်<br /> &lt;Banana&gt; &lt;Cupcake&gt;<br /> ApplePie&lt;Banana&gt;Bread&lt;Cupcake&gt;Apple&lt;Banana&gt;&lt;Cupcake&gt;<br /> ဖြစ်ခဲ့လျှင် Output မှာ<br /> Bread<br /> &lt;blank&gt;<br /> ဖြစ်သည်။</p>',
            'q_no' => '5'
        ]);
        Question::create([
            'question_text' => '<p>အလုပ်မှ ရုံးသို ့သွားရန် နောက်အကျဆုံးအိမ်မှမည့်သည့်အချိန်ထွက်ရမည်ကို ဆုံးဖြတ်သောProgramကိုရေးပါ။<br /> ၁) အိမ်မှ ဘူတာအမှတ်(၁) သို ့သွားရန် a မိနစ်ကြာသည်။<br /> ၂) ဘူတာအမှတ်(၁)မှဘူတာအမှတ်(၂)သို ့သွားရန် b မိနစ်ကြာသည်။<br /> ၃)ဘူတာအမှတ်(၂)မှ ရုံးသို ့သွားရန် cမိနစ်ကြာသည်။</p> <p>သင်သည်ရုံးသို ့ 8:59 မတိုင်ခင် ရောက်ဖို ့လိုအပ်သည်။</p> <p><img alt="illustration of question" src="https://www.aljmyanmar.com/programming_test/img/q6_01.png" style="height:257px; width:721px" /></p> <p>ဥပမာ<br /> Input တန်ဖိုးသည်<br /> 30 30 10<br /> 3<br /> 6 0<br /> 7 0<br /> 8 0<br /> ဖြစ်ခဲ့လျှင်<br /> ဘူတာအမှတ်(၁)မှ ရထားသည် 6:00, 7:00, 8:00 တွင် ရထားလာမည်ဖြစ်သည်။<br /> 7:30 တွင် အိမ်မှထွက်ပြီး 8:00ရထားကိုစီးလျှင် ရုံးသို ့ 8:40 ရောက်မည်။<br /> ထိုကြောင့် output(အိမ်မှထွက်ရမည့်အချိန် )သည် 7:30 ဖြစ်သည်။</p> <p>ပထမ Input 30 30 10 ဆိုသည်မှာအိမ်မှ ဘူတာအမှတ်(၁) သို ့သွားရန်ကြာချိန်၊ ဘူတာအမှတ်(၁)မှဘူတာအမှတ်(၂)သို ့သွားရန်ကြာချိန်၊ ဘူတာအမှတ်(၂)မှ ရုံးသို ့ သွားရန်ကြာချိန်ဖြစ်သည်။<br /> ဒုတိယ Input 3 သည် ရထားလာမည် အကြိမ်အရေအတွက်ဖြစ်သည်။</p> <p>ဥပမာ<br /> Input တန်ဖိုးသည်<br /> 10 10 10<br /> 6<br /> 8 5<br /> 8 15<br /> 8 25<br /> 8 35<br /> 8 45<br /> 8 55<br /> ဖြစ်ခဲ့လျှင် Outputမှာ<br /> 08:25<br /> ဖြစ်သည်။</p>',
            'q_no' => '6'
        ]);
        Question::create([
            'question_text' => '<p>input လက်ခံထားသော Height(H) Width(W) အတွင်း ဝင်လာသောလေးထောင့်တုံးများသည် အဆုံးသတ်တွင်မည်သည့်ပုံစံဖြစ်လာမည်ကို ဖေါ်ပြသော program ကိုရေးပါ။</p> <p><img alt="illustration of the question" src="https://www.aljmyanmar.com/programming_test/img/q7_01.png" style="height:494px; width:428px" /></p> <p>Input လက်ခံမည် Format မှာအောက်ပါအတိုင်းဖြစ်သည်။</p> <p>H W N<br /> h_1 w_1 x_1<br /> h_2 w_2 x_2<br /> ...<br /> h_N w_N x_N</p> <p>H W N တစ်လုံးနှင့်တစ်လုံးကြားတွင် space ပါဝင်သည်။<br /> H သည် ဝင်လာသောလေးထောင့်တုံးများကို လက်ခံသောမည့် Height ဖြစ်ပြီး၊ W သည် Width ဖြစ်သည်။ N သည် လက်ခံသော Height နှင့် Width အတွင်းဝင်လာမည့် လေးထောင့်တုံးအရေအတွက်ဖြစ်သည်။</p> <p>h_N သည် ဝင်လာမည့်လေးထောင့်တုံး၏ Height ဖြစ်ပြီး၊ w_N သည် Width ဖြစ်သည်။ x_N ဝင်လာမည့်လေးထောင့်တုံး၏ position ဖြစ်သည်။</p> <p>ဥပမာ (၁)<br /> Input တန်ဖိုးသည်<br /> 7 10 4<br /> 1 8 1<br /> 4 1 5<br /> 1 6 2<br /> 2 2 0<br /> ဖြစ်ခဲ့လျှင် Outputမှာ<br /> . . . . . . . . . .<br /> . .######. .<br /> . . . . .#. . . .<br /> . . . . .#. . . .<br /> ##. . .#. . . .<br /> ##. . .#. . . .<br /> .########.<br /> ဖြစ်သည်။</p> <p>ဥပမာ (၂)<br /> Input တန်ဖိုးသည်<br /> 10 10 9<br /> 2 2 4<br /> 2 2 3<br /> 2 2 5<br /> 2 2 2<br /> 2 2 6<br /> 2 2 1<br /> 2 2 7<br /> 2 2 0<br /> 2 2 8<br /> ဖြစ်ခဲ့လျှင် Outputမှာ<br /> ##. . . . . .##<br /> ##. . . . . .##<br /> .##. . . .##.<br /> .##. . . .##.<br /> . .##. .##. .<br /> . .##. .##. .<br /> . . .####. . .<br /> . . .####. . .<br /> . . . .##. . . .<br /> . . . .##. . . .<br /> ဖြစ်သည်။</p>',
            'q_no' => '7'
        ]);
        Question::create([
            'question_text' => '<p>စာလုံးများကို Highlight pen ဖြင့် Highlight လုပ်ပြီး စာလုံးဘယ်နှစ်လုံး Highlight လုပ်ခဲ့သည်အရေအတွက်ကို outputထုတ်ပေးပါ။ Highlight လုပ်ထားသော စာလုံးများကို နောက်ထပ်တစ်ကြိမ် Highlight ထက်လုပ်လျှင် Highlight ကိို remove လုပ်ခြင်းဖြစ်သည်။</p> <p><img alt="illustration of the question" src="https://www.aljmyanmar.com/programming_test/img/q8_01.png" style="height:462px; width:782px" /></p> <p>Input လက်ခံမည် Format မှာအောက်ပါအတိုင်းဖြစ်သည်။<br /> L N<br /> a_1 b_1<br /> a_2 b_2<br /> ...<br /> a_N b_N<br /> Lသည် စာလုံးအရေအတွက်ဖြစ်ပြီး၊ Nသည် Highlight လုပ်ရမည့်အကြိမ်ရေအတွက်ဖြစ်သည်။<br /> a_N သည် Highlightလုပ်ရမည့် start positon ဖြစ်ပြီး၊ b_N သည် Highlightလုပ်ရမည့် end positon ဖြစ်သည်။</p> <p>ဥပမာ (၁)<br /> Input တန်ဖိုးသည်<br /> 10 3<br /> 2 6<br /> 6 8<br /> 3 4<br /> ဖြစ်ခဲ့လျှင် Outputမှာ<br /> 5<br /> ဖြစ်သည်။</p> <p>ဥပမာ (၂)<br /> Input တန်ဖိုးသည်<br /> 10 10<br /> 1 6<br /> 2 5<br /> 1 7<br /> 1 7<br /> 2 7<br /> 2 8<br /> 1 4<br /> 2 2<br /> 1 10<br /> 2 10<br /> ဖြစ်ခဲ့လျှင် Outputမှာ<br /> 1<br /> ဖြစ်သည်။</p> <p>ဥပမာ (၃)<br /> Input တန်ဖိုးသည်<br /> 100 5<br /> 1 100<br /> 1 100<br /> 1 100<br /> 1 100<br /> 1 100<br /> ဖြစ်ခဲ့လျှင် Outputမှာ<br /> 100<br /> ဖြစ်သည်။</p> <p>ဥပမာ (၄)<br /> Input တန်ဖိုးသည်<br /> 100 20<br /> 14 14<br /> 53 100<br /> 60 64<br /> 78 82<br /> 43 45<br /> 6 7<br /> 44 45<br /> 83 98<br /> 55 58<br /> 34 34<br /> 21 37<br /> 17 73<br /> 90 98<br /> 55 62<br /> 69 76<br /> 25 73<br /> 11 89<br /> 92 94<br /> 49 53<br /> 17 17<br /> ဖြစ်ခဲ့လျှင် Outputမှာ<br /> 83<br /> ဖြစ်သည်။</p>',
            'q_no' => '8'
        ]);
       
        
    }
}
