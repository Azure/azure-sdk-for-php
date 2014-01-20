############ TEST ################

before foo1 bloc
<!-- BEGIN foo. -->
In foo1...{VAR}
<!-- END foo. -->
after foo1 bloc

before foo2 bloc
<!-- BEGIN foo2 -->
In foo2...{VAR}
<!-- END foo2 -->
after foo2 bloc

before bar bloc
<!-- BEGIN bar -->
In bar...{VAR.}
In bar...{VAR2}
<!-- END bar -->
after bar bloc