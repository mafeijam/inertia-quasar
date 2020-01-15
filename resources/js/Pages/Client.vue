<template lang="pug">
  .fit.text-blue-grey-9
    q-stepper.q-mx-auto(
      v-model="step"
      animated
      style="max-width: 600px;"
      flat
      alternative-labels
      ref="stepper"
      transition-prev="jump-right"
      transition-next="jump-left"
    )
      q-step.no-scroll(:name="1" title="填寫資料" :done="step > 1")
        q-form
          q-expansion-item.q-mb-md(group="somegroup" default-opened label="帳戶類別" header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            //- .row.q-col-gutter-md.q-mb-sm
            //-   .col-12
            //-     .text-h6.text-blue 帳戶類別
            .row.q-col-gutter-md.q-py-md
              .col-6
                q-checkbox(v-model="form.acc" val="1" label="現金帳戶")
              .col-6
                q-checkbox(v-model="form.acc" val="2" label="保證金帳戶")
              .col-6
                q-checkbox(v-model="form.acc" val="3" label="期貨帳戶")
              .col-6
                q-checkbox(v-model="form.acc" val="4" label="環球股票交易")

          //- .row.q-col-gutter-md.q-mb-sm
          //-   .col-12
          //-     q-separator
          //-   .col-12
          //-     .text-h6.text-blue 個人資料

          q-expansion-item.q-mb-md(group="somegroup" label="個人資料" header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-md.q-py-md
              .col-12.flex.justify-between.items-center
                .text-subtitle1 稱謂
                q-option-group(inline v-model="form.gender" :options="options1")
              .col-12
                q-input(label="姓名 (中)" v-model="form.name_ch" filled square)
              .col-12
                q-input(label="姓名 (英)" v-model="form.name_en" filled square)
              .col-12
                q-input(label="身份證號碼" v-model="form.id" filled square)
              .col-12
                q-input(label="出生日期 (年-月-日)" v-model="form.birth_date" filled square)
                  template(v-slot:append)
                    q-icon(name="event" class="cursor-pointer")
                      q-popup-proxy(ref="date" transition-show="scale" transition-hide="scale")
                        q-date(v-model="form.birth_date" @input="() => $refs.date.hide()" mask="YYYY-MM-DD")
              .col-12
                q-input(label="出生地點" v-model="form.birth_place" filled square)
              .col-12
                q-input(label="國籍" v-model="form.nationality" filled square)
              .col-12
                q-input(label="聯絡電話" v-model="form.phone" filled square)
              .col-12
                q-input(label="電郵" v-model="form.email" filled square)
              .col-12
                q-input(label="地址" v-model="form.address" filled square type="textarea")
              .col-12
                q-select(label="教育程度" v-model="form.edu"
                  :options="['中學或以下', '大專', '學士或以上']"
                  filled square)

            //- .col-12
            //-   q-separator
            //- .col-12
            //-   .text-h6.text-blue 受僱資料
          q-expansion-item.q-mb-md(group="somegroup" label="受僱資料" header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-md.q-py-md
              .col-12
                q-select(label="就業狀況" v-model="form.job"
                  :options="['受僱', '自僱', '待業', '退休', '學生', '家庭主婦', '其他']"
                  filled square)
              .col-12(v-if="form.job === '其他'")
                q-input(label="其他 (請註明)" v-model="form.job_oth" filled square)
              .col-12
                q-input(label="受僱機構名稱" v-model="form.company" filled square)
              .col-12
                q-input(label="業務性質" v-model="form.industry" filled square)
              .col-12
                q-input(label="服務年資" v-model="form.year" filled square)
              .col-12
                q-input(label="現時職位" v-model="form.title" filled square)
              .col-12
                q-input(label="辦公室電話" v-model="form.office_phone" filled square)
              .col-12
                q-input(label="辦公室地址" v-model="form.office_address" filled square type="textarea")


            //- .col-12
            //-   q-separator
            //- .col-12
            //-   .text-h6.text-blue 財務狀況
          q-expansion-item.q-mb-md(group="somegroup" label="財務狀況" header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-md.q-py-md
              .col-12
                q-select(label="每年收入" v-model="form.income" :options="options2" filled square)
              .col-12
                q-select(label="資產淨值" v-model="form.asset" :options="options2" filled square)
              .col-12
                q-select(label="資金來源地" v-model="form.source" :options="['香港', '中國', '美國']" filled square)
              .col-12
                q-input(label="資金來源地 (其他)" v-model="form.source_oth" filled square)
              .col-12
                .text-subtitle1 最初資金來源 (可多選)

              .col-6
                q-checkbox(v-model="form.income_init" val="1" label="薪金")
              .col-6
                q-checkbox(v-model="form.income_init" val="2" label="營運收入")
              .col-6
                q-checkbox(v-model="form.income_init" val="3" label="利息收入")
              .col-6
                q-checkbox(v-model="form.income_init" val="4" label="遺產")
              .col-6
                q-checkbox(v-model="form.income_init" val="5" label="家人贈予")
              .col-6
                q-checkbox(v-model="form.income_init" val="6" label="投資收入")
              .col-6
                q-checkbox(v-model="form.income_init" val="7" label="租金收入")
              .col-6
                q-checkbox(v-model="form.income_init" val="8" label="對外借貸")

              .col-12
                q-input(label="最初資金來源 (其他)" v-model="form.income_init_oth" filled square)

              .col-12
                .text-subtitle1 持續資金來源 (可多選)

              .col-6
                q-checkbox(v-model="form.income_cont" val="1" label="薪金")
              .col-6
                q-checkbox(v-model="form.income_cont" val="2" label="營運收入")
              .col-6
                q-checkbox(v-model="form.income_cont" val="3" label="利息收入")
              .col-6
                q-checkbox(v-model="form.income_cont" val="4" label="遺產")
              .col-6
                q-checkbox(v-model="form.income_cont" val="5" label="家人贈予")
              .col-6
                q-checkbox(v-model="form.income_cont" val="6" label="投資收入")
              .col-6
                q-checkbox(v-model="form.income_cont" val="7" label="租金收入")
              .col-6
                q-checkbox(v-model="form.income_cont" val="8" label="對外借貸")

              .col-12
                q-input(label="持續資金來源 (其他)" v-model="form.income_cont_oth" filled square)
              .col-12
                q-select(label="住屋業權" v-model="form.property"
                  :options="['擁用', '租用', '與家人同住', '按揭' , '宿舍']"
                  filled square)


            //- .col-12
            //-   q-separator
            //- .col-12
            //-   .text-h6.text-blue 投資經驗及目標
          q-expansion-item.q-mb-md(group="somegroup" label="投資經驗及目標" header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-md.q-py-md
              .col-12
                .text-subtitle1 投資經驗 (可多選)
              .col-6
                q-checkbox(v-model="form.invest_exp" val="1" label="沒有")
              .col-6
                q-checkbox(v-model="form.invest_exp" val="2" label="股票")
              .col-6
                q-checkbox(v-model="form.invest_exp" val="3" label="認股權證")
              .col-6
                q-checkbox(v-model="form.invest_exp" val="4" label="期權")
              .col-6
                q-checkbox(v-model="form.invest_exp" val="5" label="債券")
              .col-6
                q-checkbox(v-model="form.invest_exp" val="6" label="期貨")
              .col-6
                q-checkbox(v-model="form.invest_exp" val="7" label="外匯")
              .col-6
                q-checkbox(v-model="form.invest_exp" val="8" label="基金")
              .col-6
                q-checkbox(v-model="form.invest_exp" val="9" label="其他衍生工具")

              .col-12
                q-select(label="投資年資" v-model="form.invest_year"
                  :options="['沒有', '自僱', '待業', '退休', '學生', '家庭主婦', '其他']"
                  filled square)
              .col-12
                q-select(label="預期投資年期" v-model="form.job"
                  :options="['長線 (3年以上)', '中線 (1-3年)', '短線 (1年內)']"
                  filled square)

              .col-12
                .text-subtitle1 投資目標 (可多選)

              .col-6
                q-checkbox(v-model="form.invest_purpose" val="1" label="增長")
              .col-6
                q-checkbox(v-model="form.invest_purpose" val="2" label="收入")
              .col-6
                q-checkbox(v-model="form.invest_purpose" val="3" label="對沖")
              .col-6
                q-checkbox(v-model="form.invest_purpose" val="4" label="投機")
              .col-6
                q-checkbox(v-model="form.invest_purpose" val="5" label="均衡")

              .col-12
                q-input(label="投資目標 (其他)" v-model="form.invest_purpose_oth" filled square)
              .col-12
                q-select(label="風險承受程度" v-model="form.risk"
                  :options="['低', '低至中', '中', '中至高', '高']"
                  filled square)


            //- .col-12
            //-   q-separator
            //- .col-12
            //-   .text-h6.text-blue 對衍生產品的認識
          q-expansion-item.q-mb-md(group="somegroup" label="對衍生產品的認識" header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-md.q-py-md
              .col-12
                .text-subtitle1 本人知悉及明白勝利證券有限公司("勝利證券")將根據以下的資料以評估本人是否對衍生工具產品有認識
              .col-12
                q-checkbox(v-model="form.derivative" val="1" label="本人沒有對衍生產品有認識")
              .col-12
                q-checkbox(v-model="form.derivative" val="2" label="本人現時或過去3年內擁有與衍生產品有關的工作經驗")
              .col-12
                q-checkbox(v-model="form.derivative" val="3" label=" 本人於過去3年曾執行5次或以上有關衍生產品的交易")
              .col-12
                q-checkbox(v-model="form.derivative" val="4" label=" 本人於過去3年內已接受有關介紹一般衍生產品之性質及風險的培訓或課程(例如學術機構或金融機構所提供之課程)。")
          q-expansion-item.q-mb-md(group="somegroup" label="身份聲明" header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-md.q-py-md

          q-expansion-item.q-mb-md(group="somegroup" label="相關身份披露" header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-md.q-py-md


      q-step.no-scroll(:name="2" title="身份認證" :done="step > 2") 321
      q-step.no-scroll(:name="3" title="風險披露" :done="step > 3") 321
      q-step.no-scroll(:name="4" title="簽署文件") 321
      template(v-slot:navigation)
        q-stepper-navigation
          q-btn(@click="next" :color="step === 4 ? 'green' : 'blue'" :label="step === 4 ? '確認' : '下一步'")
          q-btn(v-if="step > 1" flat color="primary" @click="$refs.stepper.previous()" label="返回" class="q-ml-sm")
</template>

<script>
export default {
  data() {
    return {
      step: 1,
      options1: [
        {
          label: '先生',
          value: 1
        },
        {
          label: '女士',
          value: 2
        }
      ],
      options2: ['小於HK$200,000', 'HK$200,000-500,000', 'HK$500,001-1,000,000', 'HK$1,000,001-3,000,000', '大於HK$3,000,000'],
      form: {
        name: '',
        acc: [],
        income_init: [],
        income_cont: [],
        invest_exp: [],
        invest_purpose: [],
        derivative: []
      }
    }
  },
  methods: {
    next() {
      if (this.step == 1) {
        this.$q.dialog({
          title: '客戶協議',
          message: '123'
        })
        .onOk(() => {
          this.$refs.stepper.next()
        })
      } else {
        this.$refs.stepper.next()
      }
    }
  }
}
</script>
