import{y as f,z as h,c as r,o as t,a as s,e as n,t as i,j as u,B as d,d as k,m as S,r as B,n as V,F as b,g as _}from"./index-1lfBLovf.js";const $={class:"form-label"},C={key:0,class:"input-group-text"},x={key:1,class:"input-group-text"},A={class:"invalid-feedback"},D={__name:"AInput",props:f({label:String,type:String,placeholder:String,step:String,modelValue:{type:String},invalid:{type:Boolean},errors:{type:Array,default:()=>[]}},{modelValue:{},modelModifiers:{}}),emits:["update:modelValue"],setup(l){const a=l,o=h(l,"modelValue"),c=e=>{o.value=e.target.value},m=r(()=>({"is-invalid":a.invalid})),p=r(()=>a.type!=="textarea"?"input":"textarea"),v=r(()=>{const e={placeholder:a.placeholder,step:a.step};return p.value.type!=="textarea"&&(e.type=a.type),e});return(e,M)=>(t(),s("div",null,[n("label",$,i(l.label),1),n("div",{class:V(["input-group input-group-flat",m.value])},["prepend"in e.$slots?(t(),s("span",C,[u(e.$slots,"prepend")])):d("",!0),(t(),k(B(p.value),S({value:o.value,onInput:c},v.value,{class:"form-control"}),null,16,["value"])),"append"in e.$slots?(t(),s("span",x,[u(e.$slots,"append")])):d("",!0)],2),n("div",A,[(t(!0),s(b,null,_(l.errors,(g,y)=>(t(),s("div",{key:`error-${y}`},i(g),1))),128))])]))}};export{D as _};