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
          q-expansion-item.q-mb-sm(group="somegroup" default-opened label="帳戶類別"
            header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-sm.q-pt-sm
              .col-12
                .text-subtitle1.text-weight-bold.text-blue-grey-8 選擇帳戶類別 (可多選)
              .col-6
                q-checkbox(v-model="form.acc" val="1" label="現金帳戶")
              .col-6
                q-checkbox(v-model="form.acc" val="2" label="保證金帳戶")
              .col-6
                q-checkbox(v-model="form.acc" val="3" label="期貨帳戶")
              .col-6
                q-checkbox(v-model="form.acc" val="4" label="環球股票交易")

          q-expansion-item.q-mb-sm(group="somegroup" label="個人資料"
            header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-sm.q-pt-sm
              .col-12.flex.justify-between.items-center
                .text-subtitle1 稱謂
                q-option-group(inline v-model="form.gender" :options="options1")
              .col-12
                q-input(label="姓名 (中)" v-model="form.name_ch" square)
              .col-12
                q-input(label="姓名 (英)" v-model="form.name_en" square)
              .col-12
                q-input(label="身份證號碼" v-model="form.id" square)
              .col-12
                q-input(label="出生日期 (年-月-日)" v-model="form.birth_date" square)
                  template(v-slot:append)
                    q-icon(name="event" class="cursor-pointer")
                      q-popup-proxy(ref="date" transition-show="scale" transition-hide="scale")
                        q-date(v-model="form.birth_date" @input="() => $refs.date.hide()" mask="YYYY-MM-DD")
              .col-12
                q-input(label="出生地點" v-model="form.birth_place" square)
              .col-12
                q-input(label="國籍" v-model="form.nationality" square)
              .col-12
                q-input(label="聯絡電話" v-model="form.phone" square)
              .col-12
                q-input(label="電郵" v-model="form.email" square)
              .col-12
                q-input(label="住宅地址" v-model="form.address" square type="textarea" rows="3")
              .col-12
                q-select(label="教育程度" v-model="form.edu"
                  :options="['中學或以下', '大專', '學士或以上']"
                  square)

          q-expansion-item.q-mb-sm(group="somegroup" label="受僱資料"
            header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-sm.q-pt-sm
              .col-12
                q-select(label="就業狀況" v-model="form.job"
                  :options="['受僱', '自僱', '待業', '退休', '學生', '家庭主婦', '其他']"
                  square)
              .col-12(v-if="form.job === '其他'")
                q-input(label="其他 (請註明)" v-model="form.job_oth" square)
              .col-12
                q-input(label="受僱機構名稱" v-model="form.company" square)
              .col-12
                q-input(label="業務性質" v-model="form.industry" square)
              .col-12
                q-input(label="服務年資" v-model="form.year" square)
              .col-12
                q-input(label="現時職位" v-model="form.title" square)
              .col-12
                q-input(label="辦公室電話" v-model="form.office_phone" square)
              .col-12
                q-input(label="辦公室地址" v-model="form.office_address" square type="textarea" rows="3")

          q-expansion-item.q-mb-sm(group="somegroup" label="財務狀況"
            header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-sm.q-pt-sm
              .col-12
                q-select(label="每年收入" v-model="form.income" :options="options2" square)
              .col-12
                q-select(label="資產淨值" v-model="form.asset" :options="options7" square)
              .col-12
                q-select(label="資金來源地" v-model="form.source" :options="['香港', '中國', '美國', '其他']" square)
              .col-12(v-if="form.source == '其他'")
                q-input(label="資金來源地 (其他請註明)" v-model="form.source_oth" square color="orange" bg-color="orange-1")
              .col-12
                q-select(label="最初資金來源 (可多選)"
                  v-model="form.income_init" :options="options3"
                  square multiple emit-value map-options)
                  template(v-slot:option="scope")
                    q-item(v-bind="scope.itemProps" v-on="scope.itemEvents")
                      q-item-section {{ scope.opt.label }}
                      q-item-section(side)
                        q-checkbox(v-model="form.income_init" :val="scope.opt.value")
              .col-12(v-if="form.income_init.includes(9)")
                q-input(label="最初資金來源 (其他請註明)" v-model="form.income_init_oth" square color="orange" bg-color="orange-1")

              .col-12
                q-select(label="持續資金來源 (可多選)"
                  v-model="form.income_cont" :options="options3"
                  square multiple emit-value map-options)
                  template(v-slot:option="scope")
                    q-item(v-bind="scope.itemProps" v-on="scope.itemEvents")
                      q-item-section {{ scope.opt.label }}
                      q-item-section(side)
                        q-checkbox(v-model="form.income_cont" :val="scope.opt.value")
              .col-12(v-if="form.income_cont.includes(9)")
                q-input(label="持續資金來源 (其他請註明)" v-model="form.income_cont_oth" square color="orange" bg-color="orange-1")

              .col-12
                q-select(label="住屋業權" v-model="form.property"
                  :options="['擁用', '租用', '與家人同住', '按揭' , '宿舍']"
                  square)

          q-expansion-item.q-mb-sm(group="somegroup" label="投資經驗及目標"
            header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-sm.q-pt-sm
              .col-12
                q-select(label="投資經驗 (可多選)"
                  v-model="form.invest_exp" :options="options4"
                  square multiple emit-value map-options)
                  template(v-slot:option="scope")
                    q-item(v-bind="scope.itemProps" v-on="scope.itemEvents")
                      q-item-section {{ scope.opt.label }}
                      q-item-section(side)
                        q-checkbox(v-model="form.invest_exp" :val="scope.opt.value")

              .col-12
                q-select(label="投資年資" v-model="form.invest_year"
                  :options="['沒有', '1-3年', '3-5年', '5-10年', '超過10年']"
                  square)
              .col-12
                q-select(label="預期投資年期" v-model="form.invest_term"
                  :options="['長線 (3年以上)', '中線 (1-3年)', '短線 (1年內)']"
                  square)
              .col-12
                q-select(label="投資目標 (可多選)"
                  v-model="form.invest_purpose" :options="options5"
                  square multiple emit-value map-options)
                  template(v-slot:option="scope")
                    q-item(v-bind="scope.itemProps" v-on="scope.itemEvents")
                      q-item-section {{ scope.opt.label }}
                      q-item-section(side)
                        q-checkbox(v-model="form.invest_purpose" :val="scope.opt.value")

              .col-12(v-if="form.invest_purpose.includes(6)")
                q-input(label="投資目標 (其他)" v-model="form.invest_purpose_oth" square color="orange" bg-color="orange-1")
              .col-12
                q-select(label="風險承受程度" v-model="form.invest_risk"
                  :options="['低', '低至中', '中', '中至高', '高']"
                  square)

          q-expansion-item.q-mb-sm(group="somegroup" label="對衍生產品的認識"
            header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-sm.q-pt-sm
              .col-12
                .text-subtitle1.text-weight-bold.text-blue-grey-8 本人知悉及明白勝利證券有限公司("勝利證券")將根據以下的資料以評估本人是否對衍生工具產品有認識
              .col-12
                q-checkbox(
                  v-model="form.derivative" :val="1"
                  :disable="form.derivative.length > 0 && !form.derivative.includes(1)"
                  label="本人沒有對衍生產品有認識")
              .col-12
                q-checkbox(
                  v-model="form.derivative" :val="2"
                  :disable="form.derivative.includes(1)"
                  label="本人現時或過去3年內擁有與衍生產品有關的工作經驗")
              .col-12
                q-checkbox(
                  v-model="form.derivative" :val="3"
                  :disable="form.derivative.includes(1)"
                  label="本人於過去3年曾執行5次或以上有關衍生產品的交易")
              .col-12
                q-checkbox(
                  v-model="form.derivative" :val="4"
                  :disable="form.derivative.includes(1)"
                  label="本人於過去3年內已接受有關介紹一般衍生產品之性質及風險的培訓或課程(例如學術機構或金融機構所提供之課程)")
          q-expansion-item.q-mb-sm(group="somegroup" label="身份聲明"
            header-class="text-h6 text-blue-7 bg-blue-1" expand-icon-class="text-blue-7")
            .row.q-col-gutter-sm.q-pt-sm
              .col-12.flex.justify-between.items-center
                .text-subtitle1 本人為賬戶最終實益擁有人
                q-option-group(inline v-model="form.ultimate" :options="options6")
              template(v-if="form.ultimate === 2")
                .col-12
                  q-input(label="實益擁有人姓名" v-model="form.ult_name" square color="orange" bg-color="orange-1")
                .col-12
                  q-input(label="實益擁有人身份證" v-model="form.ult_id" square color="orange" bg-color="orange-1")
                .col-12
                  q-input(label="實益擁有人電話" v-model="form.ult_phone" square color="orange" bg-color="orange-1")
                .col-12
                  q-input(label="實益擁有人國籍" v-model="form.ult_nationality" square color="orange" bg-color="orange-1")
                .col-12
                  q-input(label="實益擁有人地址" v-model="form.ult_address" square color="orange" bg-color="orange-1" type="textarea" rows="3")
              .col-12
                .text-subtitle1.text-weight-bold.text-blue-grey-8 相關身份披露
              .col-12.flex.justify-between.items-center
                .text-subtitle1 持牌人或註冊人
                q-option-group(inline v-model="form.licensed" :options="options6")
              .col-12.row.justify-between.items-baseline
                .col-8
                  .text-subtitle1 香港證券及期貨事務監察委員會的任何持牌人或註冊人的董事或僱員
                .col-4.text-right
                  q-option-group(inline v-model="form.sfc" :options="options6")
              .col-12(v-if="form.licensed === 1 || form.sfc === 1")
                q-input(label="中央編號" v-model="form.ce_no" square color="orange" bg-color="orange-1")
              .col-12.flex.justify-between.items-center
                .text-subtitle1 香港金融管理局的有關人士
                q-option-group(inline v-model="form.hkma" :options="options6")
              .col-12.flex.justify-between.items-center
                .text-subtitle1 香港交易所的有關人士
                q-option-group(inline v-model="form.hkex" :options="options6")

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
        { label: '先生', value: 1 },
        { label: '女士', value: 2 }
      ],
      options2: [
        '小於HK$200,000',
        'HK$200,000-500,000',
        'HK$500,001-1,000,000',
        'HK$1,000,001-3,000,000',
        '大於HK$3,000,000'
      ],
      options7: [
        '小於HK$1,000,000',
        'HK$1,000,000-5,000,000',
        'HK$5,000,001-8,000,000',
        'HK$8,000,001-30,000,000',
        '大於HK$30,000,000'
      ],
      options3: [
        { label: '薪金', value: 1 },
        { label: '營運收入', value: 2 },
        { label: '利息收入', value: 3 },
        { label: '遺產', value: 4 },
        { label: '家人贈予', value: 5 },
        { label: '投資收入', value: 6 },
        { label: '租金收入', value: 7 },
        { label: '對外借貸', value: 8 },
        { label: '其他', value: 9 }
      ],
      options4: [
        { label: '沒有', value: 1 },
        { label: '股票', value: 2 },
        { label: '認股權證', value: 3 },
        { label: '期權', value: 4 },
        { label: '債券', value: 5 },
        { label: '期貨', value: 6 },
        { label: '外匯', value: 7 },
        { label: '基金', value: 8 },
        { label: '其他衍生工具', value: 9 }
      ],
      options5: [
        { label: '增長', value: 1 },
        { label: '收入', value: 2 },
        { label: '對沖', value: 3 },
        { label: '投機', value: 4 },
        { label: '均衡', value: 5 },
        { label: '其他', value: 6 },
      ],
      options6: [
        { label: '是', value: 1 },
        { label: '否', value: 2 }
      ],
      form: {
        acc: [],
        gender: null,
        name_ch: '',
        name_en: '',
        id: '',
        birth_date: null,
        birth_place: '',
        nationality: '',
        phone: '',
        email: '',
        address: '',
        edu: null,
        job: null,
        job_oth: '',
        company: '',
        industry: '',
        year: '',
        title: '',
        office_phone: '',
        office_address: '',
        income: null,
        asset: null,
        source: null,
        source_oth: '',
        income_init: [],
        income_init_oth: '',
        income_cont: [],
        income_cont_oth: '',
        property: null,
        invest_exp: [],
        invest_year: null,
        invest_term: null,
        invest_purpose: [],
        invest_purpose_oth: '',
        invest_risk: null,
        derivative: [],
        ultimate: null,
        ult_name: '',
        ult_id: '',
        ult_phone: '',
        ult_nationality: '',
        ult_address: '',
        licensed: null,
        sfc: null,
        ce_no: '',
        hkma: null,
        hkex: null
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
