import{c as o,o as c,d,w as p,j as f,m as g,r as m,R as b}from"./index-hyQisVAt.js";const y={type:String,default:"default",validator:n=>["default","primary","secondary","success","warning","danger","info","dark","outline-primary","outline-secondary","outline-success","outline-warning","outline-danger","outline-info","outline-dark","ghost-primary","ghost-secondary","ghost-success","ghost-warning","ghost-danger","ghost-info","ghost-dark"].includes(n)},v={__name:"AButton",props:{disabled:Boolean,loading:Boolean,type:{type:String,default:"button",validator:n=>["button","submit","reset"].includes(n)},href:{type:String},to:{type:[String,Object]},variant:y,square:{type:Boolean},pill:{type:Boolean},block:{type:Boolean},size:{type:String,default:"md",validator:n=>["sm","md","lg"].includes(n)}},emits:["click"],setup(n,{emit:a}){const s=a,t=n,r=o(()=>t.to?b:t.href?"a":"button"),i=o(()=>{const e={};return t.to?e.to=t.to:t.href&&(e.href=t.href),t.disabled&&(e.disabled="disabled"),e}),l=o(()=>"btn "+(t.variant?`btn-${t.variant} `:"")+(t.block?"w-100 ":"")+(t.square?"btn-square ":"")+(t.loading?"btn-loading ":"")+(t.size?`btn-${t.size} `:"")+(t.pill?"btn-pill ":"")),u=e=>{t.disabled||s("click",e)};return(e,h)=>(c(),d(m(r.value),g({class:l.value},i.value,{onClick:u}),{default:p(()=>[f(e.$slots,"default")]),_:3},16,["class"]))}};export{v as _};
